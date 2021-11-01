<?php

namespace App\Models\User;

use Budget\Serializer\Serializer;
use Budget\Users\User\User;
use Ramsey\Uuid\Uuid;

final class UserMapper
{
    /**
     * @param  array  $row
     *
     * @return User
     */
    public static function mapUserRow(array $row): User
    {
        return new User(
            $row[ 'id' ],
            Uuid::fromBytes($row[ 'uuid' ]),
            $row[ 'f_name' ],
            $row[ 'l_name' ],
            $row[ 'email' ],
            $row[ 'is_admin' ],
            $row[ 'address' ] ?? null,
            $row[ 'city' ] ?? null,
            $row[ 'provinceState' ] ?? null,
            $row[ 'postalZip' ] ?? null,
            $row[ 'country' ] ?? null,
            $row[ 'locale' ],
            $row[ 'phone' ] ?? null,
            isset($row[ 'dob' ]) ? Serializer::deserializeDate($row[ 'dob' ], Serializer::DB_DATE_FORMAT) : null,
            isset($row[ 'sex' ]) ? Serializer::getSexCode($row[ 'sex' ]) : null,
            json_decode($row[ 'settings' ], true),
            $row[ 'profileImage' ] ?? null,
            $row[ 'active' ]
        );
    }
}
