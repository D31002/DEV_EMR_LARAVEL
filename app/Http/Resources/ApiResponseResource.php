<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Exceptions\ErrorCode;

class ApiResponseResource extends JsonResource
{
    protected $code;
    protected $success;
    protected $message;
    protected $errors;
    protected $data;

    public function __construct($data,$code = 1000,$errors= null)
    {
        $this->code = $code;
        $this->success = $code === 1000 ? true : false ;
        $this->message = $code !== 1000 ? ErrorCode::from($code)->message() : null;
        $this->errors = $errors;
        $this->data = $data;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [];

        if ($this->code !== null) {
            $response['code'] = $this->code;
        }
        if ($this->success !== null) {
            $response['success'] = $this->success;
        }
        if ($this->message !== null) {
            $response['message'] = $this->message;
        }
        if ($this->errors !== null) {
            $response['errors'] = $this->errors;
        }
        if ($this->data !== null) {
            $response['data'] = $this->data;
        }

        return $response;
    }
}