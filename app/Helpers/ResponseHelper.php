<?php

namespace App\Helpers;


class ResponseHelper
{
    /**
     * Api response
     * 
     * @var array
     */
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
        ],
        'data' => null
    ];


    /**
     * @param mixed $data
     * @param string|null $message
     * Give Success Response
     */

    public static function success($data = null, $message = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;
        
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            self::$response['pagination'] = $data->toArray();
            unset(self::$response['pagination']['data']);
            self::$response['data'] = $data->toArray()['data'];
        }

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    /**
     * @param string|null $message
     * @param int $code
     * Give Error Response
     */

    public static function error($message = null, $code = 400) 
    {
        self::$response['meta']['code'] = $code;
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['message'] = $message;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
