<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Owner;
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
        $data = request()->validate([
            "horse_name"=>["string","nullable"],
            "gender"=>["string","nullable"]

        ]);
        $horse_name = isset($data["horse_name"]) ? $data["horse_name"] : "";
        $gender =  isset($data["gender"]) ? $data["gender"] : "";
        $horses = Horse::where("name","like","%".$horse_name."%")->where("gender","like","%".$gender."%")->paginate(10);

         $genders = Horse::select("gender")->distinct("gender")->get();

        
        return view("horse.index",["horses"=>$horses,"genders"=>$genders,"horse_name"=>$horse_name,"genderSearch"=>$gender]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $data=$request->validated();
        $newHorse=Horse::create($data);
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

        $owners = $horse->owner;
        $messages = $horse->message;
        $treatments = $horse->treatment;
        $tasks = $horse->task;
        $currentTime = now();

        $tasks = $tasks->where("task_start","<=",$currentTime)->where("task_end",">=",$currentTime);
        $task = $tasks->first();


        return view("horse.show",[
            "horse"=>$horse,
            "owners"=>$owners,
            "messages"=>$messages,
            "treatments"=>$treatments,
            "tasks"=>$tasks,

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
        $owners = Owner::all();
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
        $data=$request->validated();
        $horse->update($data);
        return redirect("/horses/index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        //
    }
}
