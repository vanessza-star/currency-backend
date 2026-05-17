<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->history()->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_currency' => 'required',
            'to_currency' => 'required',
            'amount' => 'required|numeric',
            'result' => 'required|numeric',
            'rate' => 'required|numeric',
        ]);

        $history = $request->user()->history()->create($request->all());

        return response()->json($history, 201);
    }
}