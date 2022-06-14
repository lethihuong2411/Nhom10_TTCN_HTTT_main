<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Danh sách các loại ngoại lệ không được báo cáo.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * Danh sách các đầu vào không bao giờ được hiển thị cho các trường hợp ngoại lệ xác thực.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Đăng ký các lệnh gọi lại xử lý ngoại lệ cho ứng dụng.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
