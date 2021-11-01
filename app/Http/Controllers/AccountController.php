<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Validators\AccountValidator;
use App\Models\Account\AccountModel;
use Budget\Serializer\Account\AccountSerializer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
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
            $data = AccountValidator::validate($request->all());
        } catch (ValidationException $e) {
            return response($e->getMessage(), 400);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response($e->getMessage(), 500);
        }

        $account = AccountSerializer::deserialize($data);

        AccountModel::write($account);

        $createdAccount = AccountMapper::mapAccountRow(
            AccountModel::whereUuid($account->getUuid()->getBytes())
                        ->first()->toArray()
        );

        return response(AccountSerializer::serialize($createdAccount), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
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
        //
    }
}
