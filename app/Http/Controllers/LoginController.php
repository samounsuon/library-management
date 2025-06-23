<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Members;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function UserLogin(Request $request)
{
    $email = $request->email;
    $password = $request->password;

    $member = Members::where('email', $email)->first();

    if ($member && Hash::check($password, $member->password)) {
        return response()->json(['message' => 'Login successful', 'member' => $member]);
    } else {
        return response()->json(['message' => 'Invalid email or password'], 401);
    }
}
}
