<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HorseMessage;
use App\Models\TaskMessage;
use Carbon\Carbon;

class Messages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   $user = Auth::user();
        if (!$user) return $next($request);
        $messages = HorseMessage::where("to_user_id",Auth::user()->id)->get();
        $messages = $messages->merge(TaskMessage::where("to_user_id",Auth::user()->id)->get());
        $messages = $messages->where("read",0);

        $tasks = $user->task->where("done",0)->where("task_day","<=",Carbon::now()->format("YYYY-mm-dd"));


        

        $request->merge(['messages' => $messages,"tasks"=>$tasks]);
        return $next($request);
    }
}
