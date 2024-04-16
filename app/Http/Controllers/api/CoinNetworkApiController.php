<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoinNetworkRequest;
use App\Http\Requests\UpdateCoinNetworkRequest;
use App\Http\Resources\CoinNetworkCollection;
use App\Http\Resources\CoinNetworkResource;
use App\Models\CoinNetwork;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CoinNetworkApiController extends Controller
{
    public function index()
    {
        $networks = QueryBuilder::for(CoinNetwork::class)->allowedFilters('name', 'id')->defaultSort('-created_at')->allowedSorts('name', 'created_at', 'updated_at')->paginate();
        return new CoinNetworkCollection($networks);
        // return new CoinNetworkCollection(CoinNetwork::paginate());
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
    public function update(UpdateCoinNetworkRequest $request, CoinNetwork $network)
    {
        $validated = $request->validated();
        $network->update($validated);
        return new CoinNetworkResource($network);
    }
    public function destroy(Request $request, CoinNetwork $network)
    {
        $network->delete();
        //return response()->noContent();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted succesfully'
        ], 200);
    }
}
