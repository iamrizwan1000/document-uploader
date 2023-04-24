<?php

namespace App\Traits;

trait ApiResponse
{


    /**
     * @param $error
     * @param $code
     * @param $message
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse($error, $code, $message, $data = null) {
        return response()->json([
            'error' => $error,
            'code' => (int)$code,
            'message' => $message,
            'data' => $data,
        ], 200);
    }


    /**
     * @param $message
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($message, $data = null) {
        return $this->apiResponse(false, 200, $message, $data);
    }


    /**
     * @param $message
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $data = null) {
        return $this->apiResponse(true, 403, $message, $data);
    }


    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound($message) {
        return $this->apiResponse(true, 404, $message);
    }


    /**
     * @param $error
     * @return \Illuminate\Http\JsonResponse
     */
    public function invalidRequest($error) {
        return $this->apiResponse(true, 422, $error);
    }


    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginRequired($message) {
        if (config('app.env') == 'production') {
            return $this->apiResponse(true, 401, 'Sorry, you are not logged in.');
        }
        return $this->apiResponse(true, 401, $message);
    }


    /**
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden($message, $code = 403) {
        return $this->apiResponse(true, $code, $message);

    }


}
