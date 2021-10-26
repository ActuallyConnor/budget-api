<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Validators\UserValidator;
use App\Models\User\UserMapper;
use App\Models\User\UserModel;
use Budget\Serializer\User\UserSerializer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function store(Request $request): Response
    {
        try {
            $data = UserValidator::validate($request->all());
        } catch (ValidationException $e) {
            return response($e->getMessage(), 400);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response($e->getMessage(), 500);
        }

        $user = UserSerializer::deserialize($data);

        UserModel::write($user);

        $createdUser = UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );

        return response(UserSerializer::serialize($createdUser), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        $user = UserMapper::mapUserRow(
            UserModel::whereId($id)->first()->toArray()
        );

        return response(UserSerializer::serialize($user), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        try {
            $data = UserValidator::validate($request->all());
        } catch (ValidationException $e) {
            return response($e->getMessage(), 400);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response($e->getMessage(), 500);
        }

        $user = UserSerializer::deserialize($data);

        $userModel = UserModel::whereId($id)->first();

        UserModel::write($user, $userModel);

        $createdUser = UserMapper::mapUserRow(
            UserModel::whereUuid($user->getUuid()->getBytes())
                     ->first()->toArray()
        );

        return response(UserSerializer::serialize($createdUser), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $user = UserModel::whereId($id)->first();
        $user->delete();

        return response(sprintf('User "%d" deleted', $user->id));
    }
}
