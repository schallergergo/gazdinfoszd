<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Horse;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = request()->validate(["search_term"=>["nullable","string","max:256"],]);
        $search_term = $data["search_term"] ?? "";
        $incomes =  Income::where("description","like","%".$search_term."%")
        ->orWhere("date","like","%".$search_term."%")
        ->orWhere("amount","like","%".$search_term."%")
        ->orderByDesc("created_at")
        ->paginate(10);
        
        return view("income.index",["incomes"=>$incomes,"search_term"=>$search_term]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($category)
    {
        $incomes =  Income::where("category",$category)->orderByDesc("created_at")->paginate(10);
        $search_term = "";
        return view("income.index",["incomes"=>$incomes,"search_term"=>$search_term]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHorse(Horse $horse)
    {
        $incomes =  Income::where("horse_id",$horse->id)->orderByDesc("created_at")->paginate(10);
        $search_term = "";
        return view("income.index",["incomes"=>$incomes,"search_term"=>$search_term]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::where("active",1)->get();
        return view("income.create",["horses"=>$horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        $data = $request->validated();
        Income::create($data);
        return redirect(route("income.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomeRequest  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect(route("income.index"));
    }
}
