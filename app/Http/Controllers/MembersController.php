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
