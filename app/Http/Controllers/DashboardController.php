<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $category = Category::count();
        $item = Item::count();
        return view("dashboard", 
        compact("category","item"));
    }
}
