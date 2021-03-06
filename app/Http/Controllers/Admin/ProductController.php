<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        // return response()->json($product);
        return view('admin.product.index', compact('product'));
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

    public function store(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['status'] = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        // return response()->json($data);

        if ($image_one && $image_two && $image_three) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300, 300)->save('media/product/' . $image_one_name);
            $data['image_one'] = 'media/product/' . $image_one_name;

            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300, 300)->save('media/product/' . $image_two_name);
            $data['image_two'] = 'media/product/' . $image_two_name;

            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300, 300)->save('media/product/' . $image_three_name);
            $data['image_three'] = 'media/product/' . $image_three_name;

            $product = DB::table('products')->insert($data);
            $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function Inactive($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Active($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function EditProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function UpdateProductWithoutphoto(Request $request, $id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $update = DB::table('products')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Nothing TO Update',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('all.product')->with($notification);
    }

    public function UpdateProductPhoto(Request $request, $id)
    {

        $old_one =  $request->old_one;
        $old_two =  $request->old_two;
        $old_three =  $request->old_three;

        $data = array();
        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');


        if ($image_one) {
            @unlink(public_path($old_one));
            $filename = date('YmdHi') . $image_one->getClientOriginalName();
            $image_one->move(public_path('media/product/'), $filename);
            $data['image_one'] = 'media/product/' . $filename;
            $product = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Image One Updated Successfully',
                'alert-type' => 'success'
            );
        }

        if ($image_two) {
            @unlink(public_path($old_two));
            $filename = date('YmdHi') . $image_two->getClientOriginalName();
            $image_two->move(public_path('media/product/'), $filename);
            $data['image_two'] = 'media/product/' . $filename;
            $product = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Image Two Updated Successfully',
                'alert-type' => 'success'
            );
        }

        if ($image_three) {
            @unlink(public_path($old_three));
            $filename = date('YmdHi') . $image_three->getClientOriginalName();
            $image_three->move(public_path('media/product/'), $filename);
            $data['image_three'] = 'media/product/' . $filename;
            $product = DB::table('products')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Image Three Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('all.product')->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $image_one = $product->image_one;
        $image_two = $product->image_two;
        $image_three = $product->image_three;

        @unlink($image_one);
        @unlink($image_two);
        @unlink($image_three);

        DB::table('products')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ViewProduct($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'subcategories.subcategory_name')
            ->where('products.id', $id)
            ->first();
        //    return response()->json($product);
        return view('admin.product.show', compact('product'));
    }
}
