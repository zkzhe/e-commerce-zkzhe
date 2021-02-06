<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Adminbrand()
    {
        $brand = Brand::all();
        return view('admin.category.brand', compact('brand'));
    }

    public function AdminStoreBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55'
        ]);
        $image = $request->file('brand_logo');

        if ($image) {
            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $image_name = date('YmdHi') . $image->getClientOriginalName();
            @unlink(public_path('media/brand/' . $brand->brand_logo));
            $image->move(public_path('media/brand'), $image_name);
            $brand->brand_logo = $image_name;
            $brand->save();
            $notification = array(
                'message' => 'Brand Added Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Its Done',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        };
    }

    public function AdminUpdateBrand(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:255'
        ]);
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        if ($request->file('brand_logo')) {
            $file = $request->file('brand_logo');
            @unlink(public_path('media/brand/' . $brand->brand_logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('media/brand/'), $filename);
            $brand->brand_logo = $filename;
        }
        $brand->save();

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.brands')->with($notification);
    }

    public function AdminEditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function AdminDeleteBrand($id)
    {
        $brand = Brand::find($id);
        $image = $brand->brand_logo;
        @unlink(public_path('media/brand/' . $image));
        $brand->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
