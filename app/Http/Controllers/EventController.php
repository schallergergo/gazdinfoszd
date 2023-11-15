<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Venue;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("viewAny",App\Models\Event::class);
        $data = request()->validate(["search_term"=>["date","nullable"]]);
        $now = Carbon::now();
        if (isset($data["search_term"])) {
            $now = Carbon::parse($data["search_term"]);
        }
        
        $date1 = $now->format("Y-m-d");

        $events = Event::where("event_day",$date1)->orderBy("start")->paginate(20);
        return view("event.index",["events"=>$events,"search_term"=>$date1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create",App\Models\Event::class);
        $venues = Venue::all();

        return view("event.create",["venues"=>$venues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $this->authorize("create",App\Models\Event::class);
        $data = $request->validated();

        Event::create($data);

        return redirect(route("event.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->authorize("update",$event);
        $venues = Venue::all();

        return view("event.edit",[

                     "venues"=>$venues,
                     "event"=>$event
                 ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorize("update",$event);
        $venues = Venue::all();
         $data = $request->validated();

        $event->update($data);

        return redirect(route("event.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->authorize("delete",$event);
        $event->delete();
        return redirect(route("event.index"));
    }
}
