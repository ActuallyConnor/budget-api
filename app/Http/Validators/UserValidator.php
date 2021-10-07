<?php

namespace App\Http\Validators;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

final class UserValidator
{
    /**
     * @param $data
     *
     * @return array
     * @throws ValidationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function validate($data): array
    {
        $validator = Validator::make($data, [
            'id'        => [
                'nullable',
                'integer'
            ],
            'uuid'      => [
                'required',
                'regex:'.UuidValidator::UUID_REGEX
            ],
            'firstName' => [
                'nullable',
                'string'
            ],
            'lastName'  => [
                'nullable',
                'string'
            ],
            'email'     => [
                'required',
                'string'
            ],
            'isAdmin'   => [
                'boolean',
                'required'
            ],
            'address'   => [
                'string',
                'nullable'
            ],
            'city'      => [
                'string',
                'nullable'
            ],
            'country'   => [
                'string',
                'nullable'
            ],
            'postalZip' => [
                'string',
                'nullable'
            ],
            'locale' => [
                'string',
                'required'
            ],
            'phone' => [
                'string',
                'nullable'
            ],
            'dob' => [
                'date',
                'nullable'
            ],
            'sex' => [
                'string',
                'nullable'
            ],
            'settings' => [
                'json',
                'required'
            ],
            'profileImage' => [
                'string',
                'nullable'
            ],
            'active' => [
                'boolean',
                'required'
            ]
        ]);

        if ($validator->fails()) {
            throw new ValidationException(print_r($validator->getMessageBag()->all(), true));
        }

        return $validator->validated();
    }
}
