<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Horse;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Carbon\Carbon;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("viewAny",App\Models\Task::class);
         $data = request()->validate(["search_term"=>["date","nullable"]]);
        $now = Carbon::now();
        if (isset($data["search_term"])) {
            $now = Carbon::parse($data["search_term"]);
        }
        
        $date1 = $now->format("Y-m-d");

        $tasks = Task::where("task_day",$date1)->orderBy("task_start")->paginate(20);
        return view("task.index",["tasks"=>$tasks,"search_term"=>$date1]);
    }

    public function horseIndex(Horse $horse)
    {
        $this->authorize("viewAny",App\Models\Task::class);
         $tasks = $horse->task()->orderBy("done")->orderBy("created_at")->paginate(20);
        return view("task.index",["tasks"=>$tasks,"search_term"=>""]);
    }
    public function userIndex(User $user)
    {
        $this->authorize("viewAny",App\Models\Task::class);
        $today = Carbon::now()->format("YYYY-mm-dd");
        $tasks = $user->task()->orderBy("done")->orderBy("created_at")->paginate(20);
        return view("task.index",["tasks"=>$tasks,"search_term"=>""]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create",App\Models\Task::class);
        $horses = Horse::where("active",1)->get();
        return view("task.create",["horses"=>$horses]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $this->authorize("create",App\Models\Task::class);
        $data = $request->validated();
        $horses = $data["horses"];
        unset($data["horses"]);

        $task = Task::create($data);

        $this->attachHorses($task, $horses);
        return redirect(route("task.edit",$task));
    }
     public function done(Task $task)
    {
        $this->authorize("editDone",App\Models\Task::class);
        $task->done = !$task->done;
        $task->save();
        return redirect()->back();
    }

    private function attachHorses(Task $task, array $horses){

        $attached_id = $task->horse->pluck("id");

        foreach($horses as $horse_id){

                $task->horse()->attach($horse_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $this->authorize("update",$task);
        $users = User::whereIn("role",["groom","worker"])->get();

        $assignedUser = $task->user;
        $unassignedUser = $users->whereNotIn("id",$assignedUser->pluck("id"));

        $horses = Horse::where("active",1)->get();
        $assignedHorse = $task->horse;
        $unassignedHorse = $horses->whereNotIn("id",$assignedHorse->pluck("id"));

        return view("task.edit",[
            "task"=>$task,
            "unassignedUser"=>$unassignedUser,
            "assignedUser"=>$assignedUser,
            "unassignedHorse"=>$unassignedHorse,
            "assignedHorse"=>$assignedHorse,
        ]);
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize("update",$task);
        $data = $request->validated();
        $task->update($data);

        return redirect(route("task.edit",$task));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize("delete",$task);
        $task->user()->detach();
        $task->horse()->detach();
        $task->delete();
        return redirect()->back();

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function attachUser(Task $task)
    {
        $this->authorize("update",$task);
        $data = request()->validate(["user_id"=>"required","min:0"]);

        $user_id = $data["user_id"];
        $task->user()->attach($user_id);

        return redirect(route("task.edit",$task));
    }


        public function detachUser(Task $task, User $user)
    {
        $this->authorize("update",$task);
        $task->user()->detach($user->id);

        return redirect(route("task.edit",$task));
    }

    public function attachHorse(Task $task)
    {
        $this->authorize("update",$task);
        $data = request()->validate(["horse_id"=>"required","integer","min:0"]);
        $horse_id = $data["horse_id"];
        $task->horse()->attach($horse_id);

        return redirect(route("task.edit",$task));
    }

        public function detachHorse(Task $task, Horse $horse)
    {
        $this->authorize("update",$task);
        $task->horse()->detach($horse->id);

        return redirect(route("task.edit",$task));
    }


}
