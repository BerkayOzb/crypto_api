<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoinCollection;
use App\Models\Coin;
use Illuminate\Http\Request;
use Validator;

class CoinApiController extends Controller
{
    public function index()
    {

        //First-way

        $coins = Coin::all();
        $data = [
            'status' => 200,
            'coin' => $coins
        ];
        return response()->json($data, 200);

        // After Collection 2nd way.
        //return new CoinCollection(Coin::all());
    }
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'volume' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $coin = new Coin();
            $coin->name = $request->name;
            $coin->volume = $request->volume;
            $coin->save();
            $data = [
                'status' => 200,
                'message' => 'Data Uploaded Succesfully'
            ];
            return response()->json($data, 200);
        }
    }
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'volume' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $coin = Coin::findOrFail($id);
            $coin->name = $request->name;
            $coin->volume = $request->volume;
            $coin->save();
            $data = [
                'status' => 200,
                'message' => 'Data Updated Succesfully'
            ];
            return response()->json($data, 200);
        }
    }
    public function delete($id)
    {
        $coin = Coin::findOrFail($id)->delete();
        $data = [
            'status' => 200,
            'message' => 'Coin deleted successfully'
        ];
        return response()->json($data, 200);
    }
}
