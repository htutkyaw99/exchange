<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HistoricalRate;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function historyRate()
    {
        $historical_rates = HistoricalRate::all();

        // dd($historical_rates);

        return view('home.historical', [
            'rates' => $historical_rates
        ]);
    }
}
