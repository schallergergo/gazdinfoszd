<?php

namespace App\Http\Controllers;

use App\Models\HorseMessage;
use App\Http\Requests\StoreHorseMessageRequest;
use App\Http\Requests\UpdateHorseMessageRequest;

class HorseMessageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHorseMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHorseMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HorseMessage  $horseMessage
     * @return \Illuminate\Http\Response
     */
    public function show(HorseMessage $horseMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HorseMessage  $horseMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(HorseMessage $horseMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHorseMessageRequest  $request
     * @param  \App\Models\HorseMessage  $horseMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHorseMessageRequest $request, HorseMessage $horseMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HorseMessage  $horseMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HorseMessage $horseMessage)
    {
        //
    }
}
