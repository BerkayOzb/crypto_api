<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoinNetworkRequest;
use App\Http\Resources\CoinNetworkCollection;
use App\Http\Resources\CoinNetworkResource;
use App\Models\CoinNetwork;
use Illuminate\Http\Request;

class CoinNetworkApiController extends Controller
{
    public function index()
    {
        return new CoinNetworkCollection(CoinNetwork::all());
    }
    public function show(Request $request, CoinNetwork $network)
    {
        return new CoinNetworkResource($network);
    }
    public function store(StoreCoinNetworkRequest $request)
    {
        $validated = $request->validated();
        $network = CoinNetwork::create($validated);

        return new CoinNetworkResource($network);
    }
}
