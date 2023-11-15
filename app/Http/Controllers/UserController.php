<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->isAdmin()) return abort(403);
        $data = request()->validate(["user_name"=>["string","max:256","nullable"]]);


        $user_name = $data["user_name"] ?? "";
        $users = User::where("name","like","%".$user_name."%")->orderByDesc("active")->orderBy("name")->paginate(20);
        
        return view("user.index",["users"=>$users,"user_name"=>$user_name]);
    }

        public function roleIndex($role)
    {
        

        if(!Auth::user()->isAdmin()) return abort(403);
        $users = User::where("role",$role)->orderByDesc("active")->orderBy("name")->paginate(20);
        
        return view("user.index",["users"=>$users,"user_name"=>""]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->isAdmin()) return abort(403);
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->isAdmin()) return abort(403);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'locale'=>["required","string","in:en,hu"],
            "role"=>["required","string",]
            ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "admin",
            'locale'=>$request->locale,
        ]);
        return redirect(route("user.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!Auth::user()->isAdmin()) return abort(403);
        return view("user.edit",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Auth::user()->isAdmin()) return abort(403);
            $data =$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'locale'=>["required","string","in:en,hu"],
            "role"=>["required","string",]
            ]);
        if ($request["email"]!=$user->email){
            $dataEmail =$request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            ]);
            $data = array_merge($data,$dataEmail);
        }
        $user->update($data);
        return redirect(route("user.index"));
    }
    public function activate(User $user){
        if(!Auth::user()->isAdmin()) return abort(403);
        $user->active = !$user->active;
        $user->save();
        return redirect()->back();
    }

    public function loginAs(User $user)
    {
        if(!Auth::user()->isAdmin()) return abort(403);
        Auth::login($user);
        return redirect("/");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
