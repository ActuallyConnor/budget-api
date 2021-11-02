<?php

namespace Tests\Feature;

use App\Models\Account\AccountMapper;
use App\Models\Account\AccountModel;
use App\Models\User\UserModel;
use Budget\Accounts\Account\Account;
use Budget\Serializer\Account\AccountSerializer;
use Budget\Users\User\User;
use Tests\TestCase;

class AccountControllerTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesAccount(): void
    {
        $response = $this->post('/api/account', $this->getAccountData());

        $response->assertStatus(201);

        $data            = json_decode($response->getContent(), true);
        $responseAccount = AccountSerializer::deserialize($data);
        $account         = AccountMapper::mapAccountRow(AccountModel::whereId($data[ 'id' ])->first()->toArray());

        $this->assertEquals($account->getId(), $responseAccount->getId());

        // clean up
        $this->deleteCreatedAccount($account->getId());
    }

    /**
     * @test
     */
    public function itRetrievesAAccountById(): void
    {
        $account = $this->createAccount();

        $response = $this->get(sprintf('/api/account/%d', $account->getId()));

        $response->assertStatus(200);
        $data            = json_decode($response->getContent(), true);
        $responseAccount = AccountSerializer::deserialize($data);

        $this->assertEquals($account->getId(), $responseAccount->getId());

        // cleanup
        $this->deleteCreatedAccount($account->getId());
    }

    /**
     * @test
     */
    public function itUpdatesAccountById(): void
    {
        $account = $this->createAccount();

        $response = $this->put(sprintf('/api/account/%d', $account->getId()), $this->getAccountData());

        $response->assertStatus(200);

        $data            = json_decode($response->getContent(), true);
        $responseAccount = AccountSerializer::deserialize($data);
        $updatedAccount  = AccountMapper::mapAccountRow(AccountModel::whereId($data[ 'id' ])->first()->toArray());

        $this->assertEquals($updatedAccount->getId(), $responseAccount->getId());

        // clean up
        $this->deleteCreatedAccount($updatedAccount->getId());
    }

    /**
     * @test
     */
    public function itDeletesAccountById(): void
    {
        $account = $this->createAccount();

        $response = $this->delete(sprintf('/api/account/%d', $account->getId()));

        $response->assertStatus(200);
        $this->assertNull(AccountModel::whereId($account->getId())->first());
    }
}
