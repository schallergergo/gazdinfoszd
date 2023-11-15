<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Rider;
use App\Models\Horse;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize("viewAny",App\Models\Lesson::class);
        $data = request()->validate(["search_term"=>["date","max:256","nullable"]]);

        $search_term = $data["search_term"]?? "";
        if ($search_term != null) $lessons = Lesson::where("date_of_lesson",$search_term)->paginate(20);
        else $lessons=Lesson::orderByDesc("created_at")->paginate(20);

        return view("lesson.index",["lessons"=>$lessons,"search_term"=>$search_term]);
    }


public function riderIndex(Rider $rider)
    {   
        $this->authorize("viewAny",App\Models\Lesson::class);
        $lessons = Lesson::where("rider_id",$rider->id)->orderByDesc("created_at")->paginate(10);
               return view("lesson.index",
                    ["lessons"=>$lessons,

                    "search_term"=>""
                ]);
        
    }
    public function dateIndex($date)
    {   
        $this->authorize("viewAny",App\Models\Lesson::class);
        $lessons = Lesson::where("date_of_lesson",$date)->orderByDesc("created_at")->paginate(10);
               return view("lesson.index",
                    ["lessons"=>$lessons,
                    "search_term"=>""
                ]);
        
    }

    public function horseIndex(Horse $horse)
    {
        $this->authorize("viewAny",App\Models\Lesson::class);
        $lessons = Lesson::where("horse_id",$horse->id)->orderByDesc("created_at")->paginate(10);
        return view("lesson.index",
                    ["lessons"=>$lessons,
                    "search_term"=>""]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create",App\Models\Lesson::class);
        $horses=Horse::where("active",1)->get();
        $riders=Rider::where("active",1)->get();
        return view("lesson.create",["horses"=>$horses,"riders"=>$riders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {
        $this->authorize("create",App\Models\Lesson::class);
        $data = $request->validated();
        $newEntry = Lesson::create($data);

        return redirect(route("lesson.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $this->authorize("view",$lesson);
        return view("lesson.show",["lesson"=>$lesson]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $this->authorize("update",$lesson);
        $horses=Horse::where("active",1)->get();
        $riders=Rider::all();
        return view("lesson.edit",[
            "lesson"=>$lesson,
            "horses"=>$horses,
            "riders"=>$riders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $this->authorize("update",$lesson);
        $data = $request->validated();
        $entry = $lesson->update($data);

        return redirect(route("lesson.index.rider",$lesson->rider_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $this->authorize("delete",$lesson);
        $lesson->delete();

        return redirect(route("lesson.index"));
    }
    private function getSearchTerm(){
        $data = request()->validate(["search_term"=>["string","nullable"]]);
        return $data["search_term"] ?? "";

    }
}
