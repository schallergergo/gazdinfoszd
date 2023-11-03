<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Horse;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
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
        $expenses =  Expense::where("description","like","%".$search_term."%")
        ->orWhere("date","like","%".$search_term."%")
        ->orWhere("amount","like","%".$search_term."%")
        ->orderByDesc("created_at")
        ->paginate(10);
        
        return view("expense.index",["expenses"=>$expenses,"search_term"=>$search_term]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($category)
    {
        $expenses =  Expense::where("category",$category)->orderByDesc("created_at")->paginate(10);
        $search_term = "";
        return view("expense.index",["expenses"=>$expenses,"search_term"=>$search_term]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHorse(Horse $horse)
    {
        $expenses =  Expense::where("horse_id",$horse->id)->orderByDesc("created_at")->paginate(10);
        $search_term = "";
        return view("expense.index",["expenses"=>$expenses,"search_term"=>$search_term]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::all();
        return view("expense.create",["horses"=>$horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        $data = $request->validated();
        Expense::create($data);
        return redirect(route("expense.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect(route("expense.index"));

    }
}
