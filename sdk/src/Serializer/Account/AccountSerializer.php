<?php

namespace Budget\Serializer\Account;

use Budget\Accounts\Account\Account;
use Budget\Serializer\Serializer;
use Money\Currency;
use Money\Money;
use Ramsey\Uuid\Uuid;

class AccountSerializer
{
    /**
     * @param  array  $data
     *
     * @return Account
     */
    public static function deserialize(array $data): Account
    {
        return new Account(
            $data[ 'id' ] ?? null,
            isset($data[ 'uuid' ]) ? Uuid::fromString($data[ 'uuid' ]) : Uuid::uuid4(),
            $data[ 'userId' ] ?? null,
            isset($data[ 'dateOpened' ]) ? Serializer::deserializeDate($data[ 'dateOpened' ]) : null,
            $data[ 'name' ],
            new Money($data[ 'balance' ], new Currency('CAD')),
            new Money($data[ 'interest' ], new Currency('CAD')),
        );
    }

    /**
     * @param  Account  $account
     *
     * @return array
     */
    public static function serialize(Account $account): array
    {
        return [
            'id'         => $account->getId(),
            'uuid'       => $account->getUuid()->getBytes(),
            'userId'     => $account->getUserId(),
            'dateOpened' => Serializer::serializeDate($account->getDateOpened()),
            'name'       => $account->getName(),
            'balance'    => Serializer::getFloatFromMoney($account->getBalance()),
            'interest'   => Serializer::getFloatFromMoney($account->getInterest())
        ];
    }
}
