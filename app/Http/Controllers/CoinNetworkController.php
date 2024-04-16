<?php

namespace App\Http\Controllers;

use App\Models\CoinNetwork;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoinNetworkController extends Controller
{
    public function AllNetwork()
    {
        $networks = CoinNetwork::paginate(5);
        return view('backend.networks.all_network', compact('networks'));
    }
    public function create()
    {
        return view('backend.networks.create_network');
    }
    public function store(Request $request)
    {
        CoinNetwork::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all.network');
    }
    public function show($id)
    {
        $network = CoinNetwork::findOrFail($id);
        return view('backend.networks.show_network', compact('network'));
    }
    public function edit($id)
    {
        $network = CoinNetwork::findOrFail($id);
        return view('backend.networks.edit_network', compact('network'));
    }
    public function update(Request $request)
    {
        $network = CoinNetwork::findOrFail($request->network_id);

        $network->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('all.network');
    }
    public function delete($id)
    {
        CoinNetwork::findOrFail($id)->delete();
        return redirect()->route('all.network');
    }
}
