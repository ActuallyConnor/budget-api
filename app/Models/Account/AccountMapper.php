<?php

namespace App\Models\Account;

use Budget\Accounts\Account\Account;
use Budget\Serializer\Serializer;
use Money\Currency;
use Money\Money;
use Ramsey\Uuid\Uuid;

class AccountMapper
{
    /**
     * @param  array  $row
     *
     * @return Account
     */
    public static function mapAccountRow(array $row): Account
    {
        return new Account(
            $row[ 'id' ],
            Uuid::fromBytes($row[ 'uuid' ]),
            $row[ 'user_id' ] ?? null,
            Serializer::deserializeDate($row[ 'date_opened' ], Serializer::DATE_TIME_FORMAT),
            $row[ 'name' ],
            new Money($row[ 'balance' ], new Currency('CAD')),
            new Money($row[ 'interest' ], new Currency('CAD'))
        );
    }
}
