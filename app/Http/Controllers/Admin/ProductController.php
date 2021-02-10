<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();
        return view('admin.product.create', compact('category', 'brand'));
    }

    public function GetSubcat($subcategory_id)
    {
        $cat = DB::table('subcategories')->where('category_id', $subcategory_id)->get();
        return json_encode($cat);
    }
}
