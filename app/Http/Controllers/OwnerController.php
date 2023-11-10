<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Horse;
use App\Models\User;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = request()->validate([
            "owner_name"=>["string","nullable"],

        ]);
        $owner_name = isset($data["owner_name"]) ? $data["owner_name"] : "";
        $owners = Owner::where("name","like","%".$owner_name."%")->
            orderByDesc("active")->orderBy("name")->paginate(10);

        return view("owner.index",["owners"=>$owners,"owner_name"=>$owner_name]);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::where("role","owner")->get();
        return view("owner.create",["users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerRequest $request)
    {
        $data = $request->validated();
        Owner::create($data);
        return redirect(route("owner.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $users = User::where("role","owner")->get();
        $horses = Horse::where("active",1)->get();
        $ownedHorses = $owner->horse;
        $notOwnedHorses = $horses->whereNotIn("id",$ownedHorses->pluck("id"));
        return view("owner.edit",["owner"=>$owner,"users"=>$users,"ownedHorses"=>$ownedHorses,"notOwnedHorses"=>$notOwnedHorses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $data = $request->validated();
        $owner->update($data);
        return redirect(route("owner.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->active = !$owner->active;
        $owner->save();
        return redirect(route("owner.index")); 
    }
    public function attachHorse(Owner $owner, Horse $horse, $returnOwner){
        $owner->horse()->attach($horse->id);
        if(!$returnOwner) return redirect(route("horse.edit",$horse));
        return redirect(route("owner.edit",$owner));
    }
     public function detachHorse(Owner $owner, Horse $horse, $returnOwner){

        $owner->horse()->detach($horse->id);
        if($returnOwner==0) return redirect(route("horse.edit",$horse));
        return redirect(route("owner.edit",$owner));
    }
}
