<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
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
        Category::create($simpan); //menambahkan data ke database
        return redirect()->route('category.index')->with('success','Category Created');
    }

    public function detail($param)
    {
        $data = Category::where('slug', $param)->firstOrFail();
        $items = Item::where('category_id', $data->id)->get();
        return view('category.detail', 
        compact('data','items'));
    }

    public function update(Request $request, $param)
    {

        $data = Category::where('slug', $param)->firstOrFail(); //object

        $request->validate([
            'category_name' => ['required','string', 'min:3', 'max:20'],
            'desc' => ['required'],
        ]);

        $simpan = [
            'category_name' => $request->input('category_name'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('category_name')).random_int(0,1000000),
        ];

        $data->update($simpan); //menyimmpan data baru data ke database

        return redirect()->route('category.detail', $data->slug)
        ->with('success','Category Created');
    }

    public function delete($param)
    {
        $data = Category::where('slug', $param)->firstOrFail();
        $data->delete();
        return redirect()->route('category.index')
        ->with('success','Category Deleted');
    }

}
