<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteConversion extends Model
{
    protected $fillable = [
        'from',
        'to',
        'amount',
        'result',
        'current_rate',
        'reverse_rate',
        'date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
