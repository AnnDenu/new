<?php

namespace App\Http\Controllers;

use App\Models\favorits;
use Illuminate\Http\Request;
class FavoritsController extends Controller
{
    public function FavoritsList()
    {
        $favoritsItems = favorits::getContent();
        return view('favorits', compact('favoritsItems'));
    }
//добавление избранного
    public static function addToFavorits(Request $request)
    {
        favorits::add([
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Курс добавлен в избранное успешно!');
        return redirect()->route('favorits.list');
    }
//обновление избранного
    public function updateFavorits(Request $request)
    {
        \favorits::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Успешно обновлено!');
        return redirect()->route('favorits.list');
    }
//удаление избранного
    public function removeFavorits(Request $request)
    {
        \favorits::remove($request->id);
        session()->flash('success', 'Item Favorits Remove Successfully !');
        return redirect()->route('favorits.list');
    }
//Очистка избранного
    public function clearAllFavorits()
    {
        \favorits::clear();
        session()->flash('success', 'Очищено успешно!');
        return redirect()->route('favorits.list');
    }
}
