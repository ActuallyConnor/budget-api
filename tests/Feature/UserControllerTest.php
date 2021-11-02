<?php

namespace Tests\Feature;

use App\Models\User\UserMapper;
use App\Models\User\UserModel;
use Budget\Serializer\User\UserSerializer;
use Budget\Users\User\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesUser(): void
    {
        $response = $this->post('/api/user', $this->getUserData());

        $response->assertStatus(201);

        $data         = json_decode($response->getContent(), true);
        $responseUser = UserSerializer::deserialize($data);
        $user         = UserMapper::mapUserRow(UserModel::whereId($data[ 'id' ])->first()->toArray());

        $this->assertEquals($user->getId(), $responseUser->getId());

        // clean up
        $this->deleteCreatedUser($user->getId());
    }

    /**
     * @test
     */
    public function itRetrievesAUserById(): void
    {
        $user = $this->createUser();

        $response = $this->get(sprintf('/api/user/%d', $user->getId()));

        $response->assertStatus(200);
        $data         = json_decode($response->getContent(), true);
        $responseUser = UserSerializer::deserialize($data);

        $this->assertEquals($user->getId(), $responseUser->getId());

        // cleanup
        $this->deleteCreatedUser($user->getId());
    }

    /**
     * @test
     */
    public function itUpdatesUserById(): void
    {
        $user = $this->createUser();

        $response = $this->put(sprintf('/api/user/%d', $user->getId()), $this->getUserData());

        $response->assertStatus(200);

        $data         = json_decode($response->getContent(), true);
        $responseUser = UserSerializer::deserialize($data);
        $updatedUser  = UserMapper::mapUserRow(UserModel::whereId($data[ 'id' ])->first()->toArray());

        $this->assertEquals($updatedUser->getId(), $responseUser->getId());

        // clean up
        $this->deleteCreatedUser($updatedUser->getId());
    }

    /**
     * @test
     */
    public function itDeletesUserById(): void
    {
        $user = $this->createUser();

        $response = $this->delete(sprintf('/api/user/%d', $user->getId()));

        $response->assertStatus(200);
        $this->assertNull(UserModel::whereId($user->getId())->first());
    }
}
