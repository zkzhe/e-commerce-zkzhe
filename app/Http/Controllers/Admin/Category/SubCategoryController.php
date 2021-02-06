<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminSubcategories()
    {
        $category = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();
        return view('admin.category.subcategory', compact('category', 'subcategories'));
    }

    public function AdminStoreSubcategory(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);
        // dd($request->category_id);
        $data = new Subcategory();
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;
        $data->save();
        $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function AdminEditSubcategory($id)
    {
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcategory', compact('subcategory', 'category'));
    }

    public function AdminUpdateSubcategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $update = DB::table('subcategories')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Sub Category Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('admin.sub.categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing To Updated',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.sub.categories')->with($notification);
        }
    }

    public function AdminDeleteSubcategory($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
