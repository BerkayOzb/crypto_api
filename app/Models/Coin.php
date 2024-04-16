<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function network()
    {
        return $this->belongsTo(CoinNetwork::class, 'network_id', 'id');
    }
}
