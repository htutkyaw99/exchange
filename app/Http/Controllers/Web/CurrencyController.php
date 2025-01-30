<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HistoricalRate;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class CurrencyController extends Controller
{
    public function rate(Request $request)
    {
        $from = $request->from ?? 'USD';

        // dd($from);

        if ($from == 'USD') {
            $response = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_aFF6gipUdLoqjZBVYBWXMWU43w7qDTADvV85y9pU&currencies=MYR%2CPHP%2CSGD%2CTHB%2CUSD");
            $result = $response->json();
        } else {
            $response = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_aFF6gipUdLoqjZBVYBWXMWU43w7qDTADvV85y9pU&currencies=MYR%2CPHP%2CSGD%2CTHB%2CUSD&base_currency={$from}");
            $result = $response->json();
        }

        return view('home.today', [
            'rate' => $result
        ]);
    }
}
