<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::all();
        $category = Category::all();
        return view('item.index', 
        compact('data', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => ['required', 'string', 'min:3', 'max:20'],
            'category_id' => ['required', 'integer'],
            'stok' => ['required', 'integer', 'min:0', 'max:1000'],
            'image' => ['required', 'file', 'max:10240', 'mimes:png,jpg,jpeg,svg,webp'],
            'desc' => ['required'],
        ]);

        $simpan = [
            'item_name' => $request->input('item_name'),
            'desc' => $request->input('desc'),
            'category_id' => $request->input('category_id'),
            'stok' => $request->input('stok'),
            'slug' => Str::slug($request->input('item_name')) . random_int(0, 1000000),
        ];

        // kondisi saat upload file

        Item::create($simpan); //menambahkan data ke database
        return redirect()->route('category.index')->with('success', 'Item Created');
    }

    public function detail($param)
    {
        $data = Category::where('slug', $param)->firstOrFail();
        $items = Item::where('category_id', $data->id)->get();
        return view(
            'category.detail',
            compact('data', 'items')
        );
    }

    public function update(Request $request, $param)
    {

        $data = Category::where('slug', $param)->firstOrFail(); //object

        $request->validate([
            'category_name' => ['required', 'string', 'min:3', 'max:20'],
            'desc' => ['required'],
        ]);

        $simpan = [
            'category_name' => $request->input('category_name'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('category_name')) . random_int(0, 1000000),
        ];

        $data->update($simpan); //menyimmpan data baru data ke database

        return redirect()->route('category.detail', $data->slug)
            ->with('success', 'Category Created');
    }

    public function delete($param)
    {
        $data = Category::where('slug', $param)->firstOrFail();
        $data->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category Deleted');
    }
}
