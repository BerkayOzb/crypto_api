<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class CoinNetwork extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function creator(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'creator_id');
    // }
}
