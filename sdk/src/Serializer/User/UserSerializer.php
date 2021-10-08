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
            $data[ 'uuid' ] ?? Uuid::uuid4(),
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
            Serializer::deserializeDate($data[ 'dob' ]),
            Serializer::getSexCode($data[ 'sex' ]),
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

        ];
    }
}
