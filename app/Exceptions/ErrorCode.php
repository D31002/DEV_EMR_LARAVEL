<?php

namespace App\Exceptions;

enum ErrorCode: int
{
    case UNDEFINED_ERROR = 9999;
    case PARAM_ERROR = 8888;
    case INVALID_PARAMETER = 7777;
    case INVALID_SORT_DIRECTION = 6666;
    case PCS_NOT_FOUND = 1001;
    case PCS_MONITORING_SCHEDULE_NOT_FOUND = 1002;
    case PTD_NOT_FOUND = 1003;
    case PTD_DETAIL_NOT_FOUND = 1004;
    case PKHDT_NOT_FOUND = 1005;
    case PKHDT_DETAIL_NOT_FOUND = 1006;
    case PKTTSDU_NOT_FOUND = 1007;
    case PKTTSDU_DETAIL_NOT_FOUND = 1008;
    case PCSC2_NOT_FOUND = 1009;
    case PCSC2_DETAIL_NOT_FOUND = 1010;

    public function message(): string
    {
        return match ($this) {
            self::UNDEFINED_ERROR => 'Lỗi chưa được phân loại',
            self::PARAM_ERROR => 'Param không hợp lệ',
            self::INVALID_PARAMETER => 'Tham số không hợp lệ',
            self::INVALID_SORT_DIRECTION => 'Sắp xếp không hợp lệ',
            self::PCS_NOT_FOUND => 'Phiếu chăm sóc không tồn tại',
            self::PCS_MONITORING_SCHEDULE_NOT_FOUND => 'Lịch theo dõi của phiếu chăm không tồn tại',
            self::PTD_NOT_FOUND => 'Phiếu truyền dịch không tồn tại',
            self::PTD_DETAIL_NOT_FOUND => 'Chi tiết phiếu truyền dịch không tồn tại',
            self::PKHDT_NOT_FOUND => 'Phiếu kế hoạch điều trị không tồn tại',
            self::PKHDT_DETAIL_NOT_FOUND => 'Chi tiết phiếu kế hoạch điều trị không tồn tại',
            self::PKTTSDU_NOT_FOUND => 'Phiếu khai thác tiền sử dị ứng không tồn tại',
            self::PKTTSDU_DETAIL_NOT_FOUND => 'Chi tiết phiếu khai thác tiền sử dị ứng không tồn tại',
            self::PCSC2_NOT_FOUND => 'Phiếu chăm sóc cấp 2 không tồn tại',
            self::PCSC2_DETAIL_NOT_FOUND => 'Chi tiết phiếu chăm sóc cấp 2 không tồn tại',
        };
    }

    public function httpStatus(): int
    {
        return match ($this) {
            self::UNDEFINED_ERROR => 500,
            self::PARAM_ERROR,self::INVALID_PARAMETER,self::INVALID_SORT_DIRECTION => 400,
            self::PCS_NOT_FOUND, self::PCS_MONITORING_SCHEDULE_NOT_FOUND,self::PTD_NOT_FOUND,self::PTD_DETAIL_NOT_FOUND,
            self::PKHDT_NOT_FOUND,self::PKHDT_DETAIL_NOT_FOUND, self::PKTTSDU_NOT_FOUND,self::PKTTSDU_DETAIL_NOT_FOUND,
            self::PCSC2_NOT_FOUND,self::PCSC2_DETAIL_NOT_FOUND => 404,
        };
    }
}