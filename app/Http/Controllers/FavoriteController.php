<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Отримати список обраних валют Ванесси
    public function index(Request $request)
    {
        return $request->user()->favorites;
    }

    // Зберегти нову валюту в обране
    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|string|max:3',
        ]);

        $favorite = $request->user()->favorites()->create([
            'currency_code' => $request->currency_code
        ]);

        return response()->json($favorite, 201);
    }

    // Видалити з обраного
  public function destroy(Request $request, $id)
{
    // Шукаємо запис саме серед обраних поточного користувача
    $favorite = $request->user()->favorites()->findOrFail($id);
    $favorite->delete();

    return response()->json(['message' => 'Видалено з обраного']);
}
}