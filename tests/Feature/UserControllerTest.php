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
    }

    private function getUserData(): array
    {
        return [
            'firstName'    => 'Test',
            'lastName'     => 'Tester',
            'email'        => 'test@example.com',
            'isAdmin'      => true,
            'address'      => '123 Test St.',
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
