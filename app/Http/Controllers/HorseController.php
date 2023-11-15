<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Owner;
use App\Models\Lesson;
use App\Models\Treatment;
use App\Http\Requests\StoreHorseRequest;
use App\Http\Requests\UpdateHorseRequest;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->authorize("viewAny",App\Models\Horse::class);
        $data = request()->validate([
            "horse_name"=>["string","nullable"],
            "gender"=>["string","nullable"]

        ]);
        $horse_name = isset($data["horse_name"]) ? $data["horse_name"] : "";
        $gender =  isset($data["gender"]) ? $data["gender"] : "";
        $horses = Horse::where("name","like","%".$horse_name."%")->
                where("gender","like","%".$gender."%")->
                orderByDesc("active")->
                orderBy("name")->

                paginate(10);

         $genders = Horse::where("active",1)->select("gender")->distinct("gender")->get();

        
        return view("horse.index",["horses"=>$horses,"genders"=>$genders,"horse_name"=>$horse_name,"genderSearch"=>$gender]);
        
    }


    public function ownerIndex(Owner $owner)
    {   
        $this->authorize("viewAny",App\Models\Horse::class);
        $horses = $owner->horse()->paginate(10);


        $genders = Horse::where("active",1)->select("gender")->distinct("gender")->get();

        
        return view("horse.index",["horses"=>$horses,"genders"=>$genders,"horse_name"=>"","genderSearch"=>""]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create",App\Models\Horse::class);
        return view("horse.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHorseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHorseRequest $request)
    {
        $this->authorize("create",App\Models\Horse::class);
        $data=$request->validated();
        $newHorse=Horse::where("active",1)->create($data);
        return redirect(route("horse.show",$newHorse));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        $this->authorize("view",$horse);
        $owners = $horse->owner;
        $messages = $horse->message;
        $treatments = Treatment::where("horse_id",$horse->id)->orderByDesc("date_of_treatment")->paginate(10);
        $tasks = $horse->task;
        $currentTime = now();
        $lessons = Lesson::where("horse_id",$horse->id)->orderByDesc("date_of_lesson")->paginate(10);

        $tasks = $tasks->where("task_start","<=",$currentTime)->where("task_end",">=",$currentTime);
        $task = $tasks->first();


        return view("horse.show",[
            "horse"=>$horse,
            "owners"=>$owners,
            "messages"=>$messages,
            "treatments"=>$treatments,
            "tasks"=>$tasks,
            "lessons"=>$lessons,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        $this->authorize("update",$horse);
        $owners = Owner::where("active",1)->get();
        $doesOwn = $horse->owner;
        $doesNotOwn = $owners->whereNotIn("id",$doesOwn->pluck("id"));
        return view("horse.edit",["horse"=>$horse,"doesOwn"=>$doesOwn,"doesNotOwn"=>$doesNotOwn]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHorseRequest  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHorseRequest $request, Horse $horse)
    {
        $this->authorize("update",$horse);
        $data=$request->validated();
        $horse->update($data);
        return redirect(route("horse.show",$horse));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        $this->authorize("delete",$horse);
        $horse->active = !$horse->active;
        $horse->save();
        return redirect(route('horse.index'));
    }
}
