<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function  index()
    {
        $user= DB::table('registers')->get();
        return response()->json($user);
    }
    function store(Request $request)
    {
        $register= new Register();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->gender= $request->gender;
        $register->password = bcrypt($request->password);
        $register->save();
        $register= new Members();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->gender= $request->gender;
        $register->password = bcrypt($request->password);
        $register->save();
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $register
        ], 201);
    }
}
