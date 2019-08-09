<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIKeyController extends Controller
{
    function store(Request $request) {

        $userID = auth('api')->user()->id;
        $key = $request->getContent();

        DB::insert('insert into api_keys (id, apiKey) values (?, ?)', [$userID, $key]);

        return response()->json("It works", 200);
    }

    function view() {

        $userID = auth('api')->user()->id;

        $key = DB::select('select apiKey from api_keys where id = ?', [$userID]);

        return response()->json($key, 200);
        
    }
}
