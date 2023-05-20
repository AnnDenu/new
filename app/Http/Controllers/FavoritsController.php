<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritsController extends Controller
{
    public function favoritList()
    {
        $favoritItems = \favorit::getContent();
        return view('favorit', compact('favoritItems'));
    }

    public function addToFavorit(Request $request)
    {
        \favorit::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Favorit Successfully !');
        return redirect()->route('favorit.list');
    }

    public function updateFavorit(Request $request)
    {
        \favorit::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Favorit is Updated Successfully !');
        return redirect()->route('favorit.list');
    }

    public function removeFavorit(Request $request)
    {
        \favorit::remove($request->id);
        session()->flash('success', 'Item Favorit Remove Successfully !');
        return redirect()->route('favorit.list');
    }

    public function clearAllFavorit()
    {
        \favorit::clear();
        session()->flash('success', 'All Item Favorit Clear Successfully !');
        return redirect()->route('favorit.list');
    }
}