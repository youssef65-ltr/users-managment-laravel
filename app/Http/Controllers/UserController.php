<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View\userViews;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("userViews.index", ["users" => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("userViews.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        $email = $request->email;
        $password = $request->password;
        User::create([
            "name" => $name,
            "age" => $age,
            "email" => $email,
            "password" => Hash::make($password)
        ]);
        return redirect()->route("users.index")->with("success", "user created successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view("userViews.show", ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("userViews.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        $age = $request->age;
        $email = $request->email;
        $password = $request->password;
        $user = User::find($id);
        $user->update([
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'password' => Hash::make($password)
        ]);
        return to_route("users.edit", $id)->with("sucssUpdate", "user with id : $id updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return to_route("users.index")->with("success", "user with id : $id deleted successfully");
    }

    /**
     * Authontication action :
     */
    public function login()
    {
        if (Auth::check()) {
            return to_route("users.index");
        }
        return view("userViews.login");
    }

    public function submitLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ["email" => $email, "password" => $password];
        // needs bcrypt logic 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route("users.index"));
        } else {
            return to_route("login");
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route("users.index");
    }
}
