<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;

use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    function index(){
        $users = User::all();
        return view('userMain',compact('users'));
    }

    function create(Request $request)
{
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    // กำหนดบทบาท
    $roles = $request->input('roles');
    if ($roles) {
        $user->roles()->sync($roles);
    }

    return redirect()->route('users.index')->with('success', 'User created successfully');
}
    

}