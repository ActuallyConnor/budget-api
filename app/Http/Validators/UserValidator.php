<?php

namespace App\Http\Validators;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

final class UserValidator
{
    /**
     * @param $data
     *
     * @return bool
     * @throws ValidationException
     */
    public static function validate($data): bool
    {
        $validator = Validator::make($data, [
            'id'     => [
                'nullable',
                'int'
            ],
            'uuid'   => [
                'required',
                'regex:'.UuidValidator::UUID_REGEX
            ],
            'f_name' => [
                'nullable',
                'string'
            ],
            'l_name' => [
                'nullable',
                'string'
            ]
        ]);

        if ($validator->fails()) {
            throw new ValidationException(print_r($validator->getMessageBag()->all(), true));
        }

        return true;
    }
}
