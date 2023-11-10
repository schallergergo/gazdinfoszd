<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = request()->validate(["user_name"=>["string","max:256","nullable"]]);


        $user_name = $data["user_name"] ?? "";
        $users = User::where("name","like","%".$user_name."%")->orderByDesc("active")->orderBy("name")->paginate(20);
        
        return view("user.index",["users"=>$users,"user_name"=>$user_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        
        $user->active = !$user->active;
        $user->save();
        return redirect()->back();
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
