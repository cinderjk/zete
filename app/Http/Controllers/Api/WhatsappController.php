<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    // status
    public function status(Request $request)
    {
        if(!auth()->user()){
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        $id = $request->id;
        $status = sessionStatus($id);
        return response()->json($status);
    }
}
