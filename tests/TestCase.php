<?php

namespace Tests;

use App\Models\Account\AccountMapper;
use App\Models\Account\AccountModel;
use App\Models\User\UserMapper;
use App\Models\User\UserModel;
use Budget\Accounts\Account\Account;
use Budget\Serializer\Account\AccountSerializer;
use Budget\Serializer\User\UserSerializer;
use Budget\Users\User\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @return User
     */
    public function createUser(): User
    {
        $user = UserSerializer::deserialize($this->getUserData());
        UserModel::write($user);

        return UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );
    }

    /**
     * @return array
     */
    public function getUserData(): array
    {
        return [
            'firstName'     => 'Test',
            'lastName'      => 'Tester',
            'email'         => 'test@example.com',
            'isAdmin'       => true,
            'address'       => '123 Test St.',
            'city'          => 'Test Town',
            'provinceState' => 'ON',
            'country'       => 'CA',
            'postalZip'     => 'A1A 1A1',
            'locale'        => 'en_CA',
            'phone'         => '+1 416-555-5555',
            'dob'           => '1993-01-01T00:00:00Z',
            'sex'           => 'M',
            'settings'      => '{}',
            'profileImage'  => 'https://example.com/profile.jpg',
            'active'        => true
        ];
    }

    /**
     * @param  int  $id
     */
    public function deleteCreatedUser(int $id): void
    {
        UserModel::whereId($id)->first()->delete();
    }

    /**
     * @return Account
     */
    public function createAccount(): Account
    {
        $account = AccountSerializer::deserialize($this->getAccountData());
        AccountModel::write($account);
        return AccountMapper::mapAccountRow(
            AccountModel::whereUuid($account->getUuid()->getBytes())
                        ->first()->toArray()
        );
    }

    /**
     * @return array
     */
    public function getAccountData(): array
    {
        $user = $this->createUser();
        return [
            'userId'    => $user->getId(),
            'dateOpened' => '1993-01-01T00:00:00Z',
            'name'       => 'Chequing',
            'balance'    => 10000,
            'interest'   => 0
        ];
    }

    /**
     * @param  int  $id
     */
    public function deleteCreatedAccount(int $id): void
    {
        AccountModel::whereId($id)->first()->delete();
    }
}
