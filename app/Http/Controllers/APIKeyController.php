<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIKeyController extends Controller
{
    function store(Request $request) {

        $userID = auth('api')->user()->id;
        $key = $request->getContent();

        DB::insert('insert into api_keys (user_id, apiKey) values (?, ?)', [$userID, $key]);

        return response()->json("It works", 200);
    }

    function view() {

        $userID = auth('api')->user()->id;

        $key = DB::select('select apiKey from api_keys where user_id = ?', [$userID]);

        return response()->json($key, 200);

    }

    function delete() {

        $userID = auth('api')->user()->id;

        DB::table('api_keys')->where('user_id', $userID)->delete();

        return response()->json("Key removed", 200);

    }
}
