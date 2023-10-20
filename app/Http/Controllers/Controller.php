<?php

namespace App\Http\Controllers;



use App\Http\Services\StatusCode;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $user;

//    public function __construct()
//    {
//        Auth::user() ? $this->user = Auth::user() : $this->user = auth()->guard('api')->user();
//    }

    /**
     * @param null $data
     * @param int $code
     * @param null $status_message
     * @return \Illuminate\Http\JsonResponse
     */
    public function _response_body($data = null, $code = StatusCode::HTTP_OK, $status_message = null)
    {
        $status_message = (!empty($status_message))
            ? $status_message
            : 'HTTP response '.$code;

        return response()->json([
            'statusCode' => $code ?: StatusCode::HTTP_OK,
            'statusMessage' => $status_message,
            'body' => $data,
        ],$code ?: StatusCode::HTTP_OK);
    }
}