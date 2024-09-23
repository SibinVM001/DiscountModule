<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBaseController extends Controller
{
    /**
     * Send success response
     *
     * @param array $data
     * @param string $message
     * @param boolean $status
     * @return \Illuminate\Http\Response
     */
    protected function sendResponse($data = [], $message = '', $status = true)
    {
    	$response = [
            'status' => $status,
            'data'    => $data,
            'message' => $message
        ];

        return response()->json($response, 200);
    }

    /**
     * Send error response
     *
     * @param $message
     * @param array $errorTrace
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($message, $errorTrace = [], $code = 200)
    {
    	$response = [
            'status' => false,
            'message' => $message,
        ];

        if (!empty($errorTrace)) {
            $response['data'] = $errorTrace;
            $errorMessage = [];

            foreach ($errorTrace as $error) {
                $errorMessage[] = isset($error[0])? str_replace('.', '', $error[0]) : '';
            }

            $response['message'] = implode(', ', $errorMessage);
        }

        return response()->json($response, $code);
    }
}
