<?php

namespace App\Exceptions;

use Exception;
use App\Http\Resources\ApiResponseResource;
use App\Exceptions\ErrorCode;

class AppException extends Exception
{
    protected $errorCode;
    protected $errors;

    public function __construct(ErrorCode $errorCode = ErrorCode::UNDEFINED_ERROR, ?array $errors= null) 
    {
        parent::__construct($errorCode->message());
        $this->errorCode = $errorCode;
        $this->errors = $errors;
    }

    public function report()
    {
        
    }

    public function render($request)
    {
        return response()->json(new ApiResponseResource(null,$this->errorCode->value,$this->errors),$this->errorCode->httpStatus());
    }

    public function getErrorCode(): ErrorCode
    {
        return $this->errorCode;
    }
}