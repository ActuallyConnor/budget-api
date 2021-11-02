<?php

namespace App\Http\Validators;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

final class AccountValidator
{
    /**
     * @param  array  $data
     *
     * @return array
     * @throws ValidationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'id'         => [
                'nullable',
                'integer'
            ],
            'uuid'       => [
                'nullable',
                'regex:'.UuidValidator::UUID_REGEX
            ],
            'userId'     => [
                'nullable',
                'integer'
            ],
            'dateOpened' => [
                'date',
                'required'
            ],
            'name'       => [
                'string',
                'required'
            ],
            'balance'    => [
                'numeric',
                'required'
            ],
            'interest'   => [
                'numeric',
                'required'
            ]
        ]);

        if ($validator->fails()) {
            dd($validator->getMessageBag());
            throw new ValidationException(print_r($validator->getMessageBag()->all(), true));
        }

        return $validator->validated();
    }
}
