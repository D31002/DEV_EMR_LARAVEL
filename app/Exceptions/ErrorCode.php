<?php

namespace App\Exceptions;

enum ErrorCode: int
{
    case UNDEFINED_ERROR = 9999;
    case PCS_NOT_FOUND = 1001;
    case PCS_MONITORING_SCHEDULE_NOT_FOUND = 1002;
    case PTD_NOT_FOUND = 1003;
    case PTD_DETAIL_NOT_FOUND = 1004;
    case PKHDT_NOT_FOUND = 1005;
    case PKHDT_DETAIL_NOT_FOUND = 1006;

    public function message(): string
    {
        return match ($this) {
            self::UNDEFINED_ERROR => 'Lỗi chưa được phân loại',
            self::PCS_NOT_FOUND => 'Phiếu chăm sóc không tồn tại',
            self::PCS_MONITORING_SCHEDULE_NOT_FOUND => 'Lịch theo dõi của phiếu chăm không tồn tại',
            self::PTD_NOT_FOUND => 'Phiếu truyền dịch không tồn tại',
            self::PTD_DETAIL_NOT_FOUND => 'Chi tiết phiếu truyền dịch không tồn tại',
            self::PKHDT_NOT_FOUND => 'Phiếu kế hoạch điều trị không tồn tại',
            self::PKHDT_DETAIL_NOT_FOUND => 'Chi tiết phiếu kế hoạch điều trị không tồn tại',
        };
    }

    public function httpStatus(): int
    {
        return match ($this) {
            self::UNDEFINED_ERROR => 500,
            self::PCS_NOT_FOUND, self::PCS_MONITORING_SCHEDULE_NOT_FOUND,self::PTD_NOT_FOUND,self::PTD_DETAIL_NOT_FOUND,
            self::PKHDT_NOT_FOUND,self::PKHDT_DETAIL_NOT_FOUND => 404,
        };
    }
}