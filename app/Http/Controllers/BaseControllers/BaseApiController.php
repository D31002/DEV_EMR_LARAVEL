<?php

namespace App\Http\Controllers\BaseControllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    protected $paramRequest;
    protected $treatmentCode;
    protected $orderBy;
    public function __construct(Request $request){
        // Param json gửi từ client
        if ($request->input('param') !== null) {
            // Thay thế dấu + và / nếu bị thay đổi thành khoảng trắng hoặc các ký tự khác
            $encodedParam  = str_replace([' ', '+', '/'], ['+', '+', '/'], $request->input('param'));
            $this->paramRequest = json_decode(base64_decode($encodedParam), true) ?? null;
            if ($this->paramRequest === null) {
                throw new AppException(ErrorCode::PARAM_ERROR);
            }
        }

        $this->treatmentCode = $this->paramRequest['ApiData']['TreatmentCode'] ?? null;
        if ($this->treatmentCode !== null) {
            if (!is_string($this->treatmentCode)) {
                throw new AppException(ErrorCode::INVALID_PARAMETER);
            }
        }

        $this->orderBy = $this->paramRequest['ApiData']['OrderBy'] ?? null;
        $this->orderByRequest = $this->paramRequest['ApiData']['OrderBy'] ?? null;
        if ($this->orderBy != null) {
            $this->orderBy = $this->convertArrayKeysToSnakeCase($this->orderBy);
            foreach ($this->orderBy as $key => $item) {
                if (!in_array($item, ['asc', 'desc'])) {
                    throw new AppException(ErrorCode::INVALID_SORT_DIRECTION);
                }
            }
        }
    }

    public function convertArrayKeysToSnakeCase(array $array)
    {
        $result = [];
        foreach ($array as $key => $value) {
            $newKey = $this->camelToSnake($key);
            $result[$newKey] = $this->camelToSnake($value);
        }
        return $result;
    }
    public function camelToSnake($input)
    {
        $pattern = '/([a-z])([A-Z])/';
        $snake = strtolower(preg_replace($pattern, '$1_$2', $input));
        return $snake;
    }
}
