<?php

namespace App\Http\Controllers;

use App\Http\Controllers\favorits;
use Illuminate\Http\Request;
class FavoritsController extends Controller
{
    public function FavoritsList()
    {
        $FavoritsItems = favorits::getContent();
        return view('Favorits', compact('FavoritsItems'));
    }
//добавление избранного
    public function addToFavorits(Request $request)
    {
        favorits::add([
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Favorits Successfully !');
        return redirect()->route('Favorits.list');
    }
//обновление избранного
    public function updateFavorits(Request $request)
    {
        favorits::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Favorits is Updated Successfully !');
        return redirect()->route('Favorits.list');
    }
//удаление избранного
    public function removeFavorits(Request $request)
    {
        \favorits::remove($request->id);
        session()->flash('success', 'Item Favorits Remove Successfully !');
        return redirect()->route('Favorits.list');
    }
//Очистка избранного
    public function clearAllFavorits()
    {
        \favorits::clear();
        session()->flash('success', 'All Item Favorits Clear Successfully !');
        return redirect()->route('Favorits.list');
    }
}
