<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends Controller
{

  
    /**
     * Get all users
     */
    public function index()
    {
        $data = \App\User::all();
        return response()->json([ 'data' => $data ]);
    }

    /**
     * Create new user
     */
    public function addUser(Request $request)
    {
        $validator =  $request->validate([
            'first_name' =>'required',
            'last_name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:8|max:20',
            'gender' =>'required',
            'age' =>'required|numeric|max:150|min:0',
            'address' =>'required'
        ]);

        $user = \App\User::create([
            'first_name' => $validator['first_name'],
            'last_name' => $validator['last_name'],
            'email' => $validator['email'],
            'password' => bcrypt($validator['password']),
            'gender' => $validator['gender'],
            'age' => $validator['age'],
            'address' => $validator['address']
        ]);

        return response()->json([
            'message' => "New user is created!",
            'data' => $user
        ], 200);
    } 
}
