<?php

namespace App\Http\Controllers;

use App\Models\UsersPhoneNumber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function storePhoneNumber(Request $request)
    {
        //Validate incoming data
        $validatedData = $request->validate([
            'phone_number' => 'required|unique:users_phone_number|numeric'
        ]);

        $user_phone_number_model = new UsersPhoneNumber($request->all());
        $user_phone_number_model->save();

        return back()->with(['success' => "{$request->phone_number} registered"]);
    }

    public function sendCustomMessage(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|array',
            'body' => 'required',
        ])
    }

    public function show()
    {
        $users = UsersPhoneNumber::all();
        return view('welcome', compact("users"));
    }
    
}
