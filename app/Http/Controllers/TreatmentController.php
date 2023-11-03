<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Horse;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;

class TreatmentController extends Controller
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

        $horses=Horse::where("active",1)->get();
        return view("treatment.create",["horses"=>$horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTreatmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTreatmentRequest $request)
    {
        $data=$request->validated();
        foreach ($data["horses"] as $horse_id){
            Treatment::create([
            "horse_id"=>$horse_id,     
            "date_of_treatment" => $data["date_of_treatment"],
            "type_of_treatment"=> $data["type_of_treatment"],
            "cost_of_treatment" => $data["cost_of_treatment"],
            "date_of_notification"=> $data["date_of_notification"],
            "comments"=>$data["comments"]]);
        }
        return redirect(route("treatment.create")); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        //return $treatment->date_of_treatment;
        return view("treatment.edit",["treatment"=> $treatment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTreatmentRequest  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTreatmentRequest $request, Treatment $treatment)
    {
        $data=$request->validated();
        $treatment->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
