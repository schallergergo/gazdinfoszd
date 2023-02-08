<?php

namespace App\Http\Controllers;

use App\Models\Horse;
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
        $horses = Horse::all();
        return view("horse.index",["horses"=>$horses]);

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
        return redirect(route("horse.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view("horse.edit",["horse"=>$horse]);
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
