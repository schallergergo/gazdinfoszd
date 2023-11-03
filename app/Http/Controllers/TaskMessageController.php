<?php

namespace App\Http\Controllers;

use App\Models\TaskMessage;
use App\Models\Task;
use App\Http\Requests\StoreTaskMessageRequest;
use App\Http\Requests\UpdateTaskMessageRequest;
use Illuminate\Support\Facades\Auth;

class TaskMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $messages = $task->message->sortByDesc("created_at");
        return view("taskmessage.index",["task"=>$task,"messages"=>$messages]);
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
    public function store(StoreTaskMessageRequest $request,Task $task)
    {
        $data = $request->validated();
        $data = array_merge($data,["user_id"=>Auth::user()->id,"task_id"=>$task->id]);

        $newMessage = TaskMessage::create($data);
        return redirect(route("taskmessage.index",$task));

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
