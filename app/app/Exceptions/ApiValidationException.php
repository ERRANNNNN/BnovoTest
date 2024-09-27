<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;

class ApiValidationException extends Exception
{
    protected Validator $validator;
    public function __construct(Validator $validator)
    {
        parent::__construct();
        $this->validator = $validator;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            "status" => 0,
            "errors" => $this->validator->getMessageBag()->all()
        ]);
    }
}
