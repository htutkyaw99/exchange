<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalRate extends Model
{
    protected $fillable = ['base_id', 'target_id', 'date', 'rate'];
}
