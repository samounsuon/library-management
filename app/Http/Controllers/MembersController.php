<?php

namespace App\Http\Controllers;

use App\Models\Members;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    function index()
    {
        $member = DB::table('members')->get();
            return response()->json(['members' => $member], 200);
    }
    function store(Request $request){
         $register= new Members();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->gender= $request->gender;
        $register->password = bcrypt($request->password);
        $register->save();
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $request
        ], 201);
    }
  function update(Request $request, $id)
    {
        $member = Members::find($id);
        if (!$member) {
            return response()->json(["message" => "Member not found"], 404);
        }
        $data = $request->only(['name', 'email', 'phone', 'gender']);
        $updated = $member->update($data);

        if ($updated) {
            return response()->json(["message" => "Update successfully"], 200);
        } else {
            return response()->json(["message" => "Update failed"], 400);
        }
    }

    
    function destroy($id)
    {
        $member = Members::find($id);
        if (!$member) {
            return response()->json(["message" => "Member not found"], 404);
        }
        $member->delete();
        return response()->json(["message" => "Member deleted successfully"], 200);
    }
}
