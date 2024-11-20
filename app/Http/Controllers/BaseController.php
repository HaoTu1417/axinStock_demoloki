<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    protected const IS_ROLLBACK = true;
    protected const IS_COMMIT = true;
    protected $user_info;



    public function __construct()
    {
        parent::__construct();
     
    }

    function success($message = "", $_HTTP_CODE = JsonResponse::HTTP_OK)
    {
        DB::commit();
        return response()->json([
            'status' => true,
            'message' => $message
        ], $_HTTP_CODE);
    }
    function error($message = "", $_HTTP_CODE = JsonResponse::HTTP_OK)
    {
        DB::rollBack();
        return response()->json([
            'status' => false,
            'message' => $message
        ], $_HTTP_CODE);
    }
    function data($data = [], $_HTTP_CODE = JsonResponse::HTTP_OK)
    {
        return response()->json($data, $_HTTP_CODE);
    }
}
