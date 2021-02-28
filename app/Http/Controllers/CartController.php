<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();

        if ($product->discount_price == NULL) {
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added on your Cart'], 200);
        } else {
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return response()->json(['success' => 'Successfully Added on your Cart'], 200);
        }
    }

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }

    public function showCart()
    {
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Product Remove from Cart',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->productId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification = array(
            'message' => 'Product Quantity Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function viewProduct($id)
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
        return response()->json(array(
            'product' => $product,
            'product_color' => $product_color,
            'product_size' => $product_size,
        ));
    }

    public function insertCart(Request $request)
    {
        $id = $request->product_id;
        $product = DB::table('products')->where('id', $id)->first();
        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;

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
                'message' => 'Product Added Successfully',
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
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function checkout()
    {
        if (Auth::check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        } else {
            $notification = array(
                'message' => 'At first Login Your Account',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    public function wishlist()
    {
        $userId = Auth::id();
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select('products.*', 'wishlists.user_id')
            ->where('wishlists.user_id', $userId)
            ->get();
        return view('pages.wishlist', compact('product'));
    }
}
