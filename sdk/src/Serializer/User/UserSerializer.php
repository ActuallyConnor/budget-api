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
            $data[ 'provinceState' ] ?? null,
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
            'id'            => $user->hasId() ? $user->getId() : null,
            'uuid'          => $user->getUuid()->toString(),
            'firstName'     => $user->hasFirstName() ? $user->getFirstName() : null,
            'lastName'      => $user->hasLastName() ? $user->getLastName() : null,
            'email'         => $user->getEmail(),
            'isAdmin'       => $user->isAdmin(),
            'address'       => $user->hasAddress() ? $user->getAddress() : null,
            'city'          => $user->hasCity() ? $user->getCity() : null,
            'provinceState' => $user->hasProvinceState() ? $user->getProvinceState() : null,
            'country'       => $user->hasCountry() ? $user->getCountry() : null,
            'postalZip'     => $user->hasPostalZip() ? $user->getPostalZip() : null,
            'locale'        => $user->getLocale(),
            'phone'         => $user->hasPhone() ? $user->getPhone() : null,
            'dob'           => $user->hasDob() ? Serializer::serializeDate($user->getDob()) : null,
            'sex'           => $user->hasSexCode() ? Serializer::getSexFromCode($user->getSexCode()) : null,
            'settings'      => json_encode($user->getSettings()),
            'profileImage'  => $user->hasProfileImage() ? $user->getProfileImage() : null,
            'active'        => $user->isActive()
        ];
    }
}
