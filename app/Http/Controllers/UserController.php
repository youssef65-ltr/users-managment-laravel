<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("index" , ["users" => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fullName = $request->fullName ;
        $age = $request->age ;
        User::create([
            "name" => $fullName,
            "age" => $age 
        ]);
        return redirect()->route("users.index")->with("success" , "user created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view("show" ,['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("edit" , ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , string $id)
    {
        $name = $request->name ;
        $age = $request->age ;
        $user = User::find($id);
        $user->update(['name' => $name , 'age' => $age]);
        return to_route("users.edit" , $id)->with("sucssUpdate" , "user with id : $id updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
