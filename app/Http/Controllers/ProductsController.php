<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request) {

        $user = auth('api')->user();

        $apiKey = $user->apikey->apiKey;

        $bearerToken = $apiKey;

        $guzzleClient = new \GuzzleHttp\Client();

        $headers = [
            'Authorization' => 'Bearer ' . $bearerToken,
        ];

        $jsonData = json_encode($request->getContent());

        $response = $guzzleClient->post('https://api.products.management/api/products',
            ['body' => $jsonData],
            ['headers' => $headers]
        );

        if ($response->getStatusCode()==200){
            return response()->json("Products sent", 200);
        }
        return response()->json("Error: ", $response->getStatusCode());



    }
}
