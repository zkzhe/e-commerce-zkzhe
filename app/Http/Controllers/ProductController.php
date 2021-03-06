<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productView($id, $product_name)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);
        return view('pages.product_details', compact('product', 'product_color', 'product_size'));
    }

    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($product->discount_price == NULL) {
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Successfully Added',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification = array(
                'message' => 'Product Successfully Added',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function productsView($id)
    {
        $subcatname = DB::table('subcategories')->where('id', $id)->get();

        $products = DB::table('products')->where('subcategory_id', $id)->paginate(5);

        $categorys = DB::table('categories')->get();

        $brands = DB::table('products')->where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();

        return view('pages.all_products', compact('products', 'categorys', 'brands', 'subcatname'));
    }

    public function categoryView($id)
    {
        $catname = DB::table('categories')->where('id', $id)->get();
        $category_all =  DB::table('products')->where('category_id', $id)->paginate(10);
        return view('pages.all_category', compact('category_all', 'catname'));
    }
}
