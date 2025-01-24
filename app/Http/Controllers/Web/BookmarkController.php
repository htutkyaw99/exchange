<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\FavouriteConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function favourite()
    {
        $values = FavouriteConversion::where('user_id', Auth::id())->get();

        // dd($value);

        return view('home.favourite', [
            'values' => $values
        ]);
    }

    public function save(Request $request)
    {
        // dd($request->all());

        FavouriteConversion::create([
            'from' => $request->from,
            'to' => $request->to,
            'amount' => $request->amount,
            'result' => $request->result,
            'current_rate' => $request->current_rate,
            'reverse_rate' => $request->reverse_rate,
            'date' => $request->date,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('welcome');
    }
}
