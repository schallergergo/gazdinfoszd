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
        $this->authorize("viewAny",App\Models\Treatment::class);
        request()->validate(["search_term"=>["string","max:256","nullable"]]);

        $search_term = $data["search_term"] ?? "";

        if ($search_term=="") $treatments = Treatment::paginate(20);
        else $treatments = Treatment::where("comments","like","%".$search_term."%")->paginate(20);

        return view("treatment.index",["treatments"=>$treatments,"search_term"=>$search_term]);

    }

    public function categoryIndex($category)
    {
       $this->authorize("viewAny",App\Models\Treatment::class);
        $treatments = Treatment::where("type_of_treatment",$category)->paginate(20);
        return view("treatment.index",["treatments"=>$treatments,"search_term"=>""]);

    }
    public function horseIndex(Horse $horse)
    {
       $this->authorize("viewAny",App\Models\Treatment::class);
        $treatments = Treatment::where("horse_id",$horse->id)->paginate(20);
        return view("treatment.index",["treatments"=>$treatments,"search_term"=>""]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create",App\Models\Treatment::class);
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
        $this->authorize("create",App\Models\Treatment::class);
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
        return redirect(route("treatment.index")); 
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
        $this->authorize("update",$treatment);
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
        $this->authorize("update",$treatment);
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
        $this->authorize("delete",$treatment);
        $treatment->delete();
        return redirect()->back();
    }
}
