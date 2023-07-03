<?php

namespace App\Http\Controllers;

use App\Models\TaskMessage;
use App\Http\Requests\StoreTaskMessageRequest;
use App\Http\Requests\UpdateTaskMessageRequest;

class TaskMessageController extends Controller
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
     * @param  \App\Http\Requests\StoreTaskMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskMessage  $taskMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TaskMessage $taskMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskMessage  $taskMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskMessage $taskMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskMessageRequest  $request
     * @param  \App\Models\TaskMessage  $taskMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskMessageRequest $request, TaskMessage $taskMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskMessage  $taskMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskMessage $taskMessage)
    {
        //
    }
}
