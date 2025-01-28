<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConversionController extends Controller
{
    public function conversion(Request $request)
    {
        return view('home.conversion');
    }

    public function convert(Request $request)
    {
        // dd('Hello');

        $from = $request->from_currency;

        $to = $request->to_currency;

        if ($from == 'USD') {
            $response = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_aFF6gipUdLoqjZBVYBWXMWU43w7qDTADvV85y9pU&currencies={$to}");
            $result = $response->json();
        } else {
            $response = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_aFF6gipUdLoqjZBVYBWXMWU43w7qDTADvV85y9pU&currencies={$to}&base_currency={$from}");
            $result = $response->json();
        }

        $convertedValue = $result['data'][$to] * $request->amount;

        $value = [
            'from' => $from,
            'to' => $to,
            'amount' => $request->amount,
            'result' => round($convertedValue, 4),
            'current_rate' => round($result['data'][$to], 4),
            'reverse_rate' => round(1 / $result['data'][$to], 4),
            'date' => now()->toDateString(),
        ];

        return view('home.conversion', [
            'value' => $value
        ]);
    }
}
