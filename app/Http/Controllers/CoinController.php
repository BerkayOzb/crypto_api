<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\CoinNetwork;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function AllCoin()
    {
        // $coins = Coin::latest()->get();

        $coins = Coin::paginate(5);
        return view('backend.coin.all_coin', compact('coins'));
    }
    public function create()
    {
        $networks = CoinNetwork::latest()->get();

        return view('backend.coin.create_coin', compact('networks'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => ['required', 'max:2028', 'image'],
        //     'title' => ['required', 'max:255'],
        //     'category_id' => ['required', 'integer'],
        //     'description' => ['required']
        // ]);
        $coin = new Coin();
        $coin->name = $request->name;
        $coin->description = $request->description;
        $coin->volume = $request->volume;
        $coin->network_id = $request->network_id;
        $coin->save();
        //return redirect()->back();
        return redirect()->route('all.coin');
    }
    public function show($id)
    {
        $coin = Coin::findOrFail($id);
        return view('backend.coin.show_coin', compact('coin'));
    }
    public function edit($id)
    {
        $coin = Coin::findOrFail($id);
        return view('backend.coin.edit_coin', compact('coin'));
    }
    public function update(Request $request)
    {
        $coin = Coin::findOrFail($request->coin_id);

        $coin->update([
            'name' => $request->name,
            'volume' => $request->volume,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('all.coin');
    }
    public function delete($id)
    {
        Coin::findOrFail($id)->delete();
        return redirect()->back();
    }
}
