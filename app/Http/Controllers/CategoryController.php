<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index');
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
        }

        return redirect()->route('admin.category.index');
    }
}
