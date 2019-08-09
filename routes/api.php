<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/addkey', 'APIKeyController@store');

Route::middleware('auth:api')->get('/viewkeys', 'APIKeyController@view');

Route::middleware('auth:api')->post('/products', function(Request $request){

    $guzzleClient = new GuzzleHttp\Client();
    $guzzleResponse = $guzzleClient->post('https://entpebyij95.x.pipedream.net/', ['body' => $request->getContent()]);

    return $guzzleResponse;
});
