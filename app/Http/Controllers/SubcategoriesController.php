<?php

namespace App\Http\Controllers;

use App\Subcategories;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = Subcategories::with('category')
            ->where('user_id', Auth::id())
            ->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Categories::where('user_id', Auth::id())->get();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cat_id' => 'required|exists:categories,id',
        ]);

        Subcategories::create([
            'user_id' => Auth::id(),
            'cat_id' => $request->cat_id,
            'name' => $request->name,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully!');
    }

    public function edit($id)
    {
        $subcategory = Subcategories::where('user_id', Auth::id())->findOrFail($id);
        $categories = Categories::where('user_id', Auth::id())->get();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cat_id' => 'required|exists:categories,id',
        ]);

        $subcategory = Subcategories::where('user_id', Auth::id())->findOrFail($id);
        $subcategory->update([
            'cat_id' => $request->cat_id,
            'name' => $request->name,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully!');
    }

    public function destroy($id)
    {
        $subcategory = Subcategories::where('user_id', Auth::id())->findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully!');
    }
} 