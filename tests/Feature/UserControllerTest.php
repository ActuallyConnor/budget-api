<?php

namespace Tests\Feature;

use App\Models\User\UserMapper;
use App\Models\User\UserModel;
use Budget\Serializer\User\UserSerializer;
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
        $user = UserSerializer::deserialize($this->getUserData());
        UserModel::write($user);
        $createdUser = UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );

        $response = $this->get(sprintf('/api/user/%d', $createdUser->getId()));

        $response->assertStatus(200);
        $data         = json_decode($response->getContent(), true);
        $responseUser = UserSerializer::deserialize($data);

        $this->assertEquals($createdUser->getId(), $responseUser->getId());

        // cleanup
        $this->deleteCreatedUser($createdUser->getId());
    }

    /**
     * @test
     */
    public function itUpdatesUserById(): void
    {
        $user = UserSerializer::deserialize($this->getUserData());
        UserModel::write($user);
        $createdUser = UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );

        $response = $this->put(sprintf('/api/user/%d', $createdUser->getId()), $this->getUserData());

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
        $user = UserSerializer::deserialize($this->getUserData());
        UserModel::write($user);
        $createdUser = UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );

        $response = $this->delete(sprintf('/api/user/%d', $createdUser->getId()));

        $response->assertStatus(200);
        $this->assertNull(UserModel::whereId($createdUser->getId())->first());
    }

    /**
     * @return array
     */
    private function getUserData(): array
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
    private function deleteCreatedUser(int $id): void
    {
        UserModel::whereId($id)->first()->delete();
    }
}
