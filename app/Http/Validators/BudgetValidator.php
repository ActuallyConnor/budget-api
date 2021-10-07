<?php

namespace App\Http\Validators;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

final class BudgetValidator
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
            'id'       => [
                'nullable',
                'integer'
            ],
            'uuid'     => [
                'required',
                'regex:'.UuidValidator::UUID_REGEX
            ],
            'year'     => [
                'integer',
                'required'
            ],
            'month'    => [
                'integer',
                'required'
            ],
            'categoryId'   => [
                'nullable',
                'integer'
            ],
            'userId'   => [
                'nullable',
                'integer'
            ],
            'budgeted' => [
                'numeric',
                'required'
            ],
            'spent'    => [
                'numeric',
                'required'
            ],
            'balance'  => [
                'numeric',
                'required'
            ]
        ]);

        if ($validator->fails()) {
            throw new ValidationException(print_r($validator->getMessageBag()->all(), true));
        }

        return $validator->validated();
    }
}
