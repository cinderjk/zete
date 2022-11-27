<?php

namespace App\Http\Controllers;

use App\Models\MessageLog;
use App\Http\Requests\StoreMessageLogRequest;
use App\Http\Requests\UpdateMessageLogRequest;

class MessageLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageLog  $messageLog
     * @return \Illuminate\Http\Response
     */
    public function show(MessageLog $messageLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageLog  $messageLog
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageLog $messageLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageLogRequest  $request
     * @param  \App\Models\MessageLog  $messageLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageLogRequest $request, MessageLog $messageLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageLog  $messageLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageLog $messageLog)
    {
        //
    }
}
