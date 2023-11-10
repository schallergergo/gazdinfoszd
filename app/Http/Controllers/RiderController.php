<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\User;
use App\Http\Requests\StoreRiderRequest;
use App\Http\Requests\UpdateRiderRequest;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = request()->validate([
            "rider_name"=>["string","nullable"],
        ]);
        $rider_name = isset($data["rider_name"]) ? $data["rider_name"] : "";
        $riders = Rider::where("name","like","%".$rider_name."%")->
        orderByDesc("active")->orderBy("name")->paginate(10);


        
        return view("rider.index",["riders"=>$riders,"rider_name"=>$rider_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where("role","rider")->get();
        return view("rider.create",["users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRiderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRiderRequest $request)
    {
        $data = $request->validated();
        $rider = Rider::create($data);
        return redirect(route("rider.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        return $rider;
    }

     public function getPrice(Rider $rider)
    {
        return json_encode($rider->normal_price);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit(Rider $rider)
    {
        $users = User::where("role","rider")->get();
        return view("rider.edit",["rider"=>$rider,"users"=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRiderRequest  $request
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRiderRequest $request, Rider $rider)
    {

        $data = $request->validated();
        $rider->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {

        $rider->active = !$rider->active;
        $rider->save();

        return redirect()->back();

    }
}
