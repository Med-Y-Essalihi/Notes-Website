<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Item ajouté avec succès');
    }
    

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item mis à jour avec succès!');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item supprimé avec succès!');
    }
}
