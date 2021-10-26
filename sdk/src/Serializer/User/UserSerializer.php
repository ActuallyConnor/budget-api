<?php

namespace Budget\Serializer\User;

use Budget\Serializer\Serializer;
use Budget\Users\User\User;
use Ramsey\Uuid\Uuid;

class UserSerializer
{
    /**
     * @param  array  $data
     *
     * @return User
     */
    public static function deserialize(array $data): User
    {
        return new User(
            $data[ 'id' ] ?? null,
            isset($data[ 'uuid' ]) ? Uuid::fromString($data[ 'uuid' ]) : Uuid::uuid4(),
            $data[ 'firstName' ] ?? null,
            $data[ 'lastName' ] ?? null,
            $data[ 'email' ],
            $data[ 'isAdmin' ],
            $data[ 'address' ] ?? null,
            $data[ 'city' ] ?? null,
            $data[ 'country' ] ?? null,
            $data[ 'postalZip' ] ?? null,
            $data[ 'locale' ],
            $data[ 'phone' ] ?? null,
            isset($data[ 'dob' ]) ? Serializer::deserializeDate($data[ 'dob' ]) : null,
            isset($data[ 'sex' ]) ? Serializer::getSexCode($data[ 'sex' ]) : null,
            json_decode($data[ 'settings' ], true),
            $data[ 'profileImage' ] ?? null,
            $data[ 'active' ]
        );
    }

    /**
     * @param  User  $user
     *
     * @return array
     */
    public static function serialize(User $user): array
    {
        return [
            'id'           => $user->hasId() ? $user->getId() : null,
            'uuid'         => $user->getUuid()->toString(),
            'firstName'    => $user->hasFirstName() ? $user->getFirstName() : null,
            'lastName'     => $user->hasLastName() ? $user->getLastName() : null,
            'email'        => $user->getEmail(),
            'isAdmin'      => $user->isAdmin(),
            'address'      => $user->hasAddress() ? $user->getAddress() : null,
            'city'         => 'Test Town',
            'country'      => 'Canada',
            'postalZip'    => 'A1A1A1',
            'locale'       => 'en_CA',
            'phone'        => '+14165555555',
            'dob'          => '1993-01-01T00:00:00Z',
            'sex'          => 'M',
            'settings'     => '{}',
            'profileImage' => 'https://example.com/profile.jpg',
            'active'       => true
        ];
    }
}
