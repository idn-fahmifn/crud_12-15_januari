<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required','string', 'min:3', 'max:20'],
            'desc' => ['required'],
        ]);

        $simpan = [
            'category_name' => $request->input('category_name'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('category_name')).random_int(0,1000000),
        ];

        Category::create($simpan);
        return redirect()->route('category.index')->with('success','Category Created');

    }
}
