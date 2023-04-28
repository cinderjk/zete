<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Baileys;

class ContactController extends Controller
{
    /**
     * Check if a WhatsApp number exists.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the result of the number check.
     */
    public function checkNumber(Request $request)
    {
        $id = $request->device_id;
        $number = $request->phone;

        $check = Baileys::make()->checkNumber($id, $number);
        
        return response()->json($check);    
    }

    /**
     * Block or unblock a contact based on the provided request parameters.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the result of the block operation.
     */
    public function blockContact(Request $request)
    {
        $id = $request->device_id;
        $number = $request->phone;
        $block = $request->block == 'false' ? false : true;

        $block = Baileys::make()->blockContact($id, $number, $block);
        
        return response()->json($block);            
    }
}
