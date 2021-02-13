<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser
{
    public function validResponse($data, $code = Response::HTTP_OK){
        return response()->json(['data' => $data ,'message' => null, 'code' => $code], $code);
    }

    public function successResponse($data, $code = Response::HTTP_OK){
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    public function errorResponse($message,$code){

        return response()->json(['data'=> null, 'message'=>$message,'code'=>$code],$code);
    }
}
