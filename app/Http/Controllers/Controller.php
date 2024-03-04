<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function proccessError(Exception $exception) : array
    {
        $file = __FILE__;
        $error = "An error occurred on file: '{$file}', line: '{$exception->getLine()}', exception: '{$exception->getMessage()}'";
        Log::error($error);
        switch ($exception->getCode()) {
            case 500:
                $notification = [
                    'title' => trans('validation.generic.ops'),
                    'message' => trans('validation.generic.failed_job'),
                    'alert-type' => 'danger',
                ];
                break;
            case 404:
                $notification = [
                    'title' => trans('validation.generic.verify_data'),
                    'message' => trans('validation.generic.not_found'),
                    'alert-type' => 'warning',
                ];
                break;
            case 0:
                $notification = [
                    'title' => trans('validation.generic.ops'),
                    'message' => trans('validation.generic.any_error'),
                    'alert-type' => 'warning',
                ];
                break;
            default:
                $notification = [
                    'title' => trans('validation.generic.verify_data'),
                    'message' => trans('validation.generic.any_error'),
                    'alert-type' => 'warning',
                ];
                break;
        }
        return $notification;
    }

}
