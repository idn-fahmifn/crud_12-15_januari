<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::all();
        $category = Category::all();
        return view(
            'item.index',
            compact('data', 'category')
        );
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
        if ($request->hasFile('image')) {

            $gambar = $request->file('image'); //mengambil data file yang diupload oleh user
            $path = 'public/images/items'; //path penyimpanan
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'item-image-' . Carbon::now('Asia/Jakarta')->format('Ymdhis') .'.'. $ext;

            // nilai yang akan disimpan ke database : 
            $simpan['image'] = $nama;
            $gambar->storeAs($path, $nama);

        }


        Item::create($simpan); //menambahkan data ke database
        return redirect()->route('item.index')->with('success', 'Item Created');
    }

    public function detail($param)
    {
        $data = Item::where('slug', $param)->firstOrFail();
        $category = Category::all();
        return view(
            'item.detail',
            compact('data', 'category')
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
