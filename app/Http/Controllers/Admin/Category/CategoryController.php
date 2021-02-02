<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminCategory()
    {
        $category = Category::all();
        return view('admin.category.category', compact('category'));
    }

    public function AdminStoreCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // DB::table('categories')->insert($data);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function AdminEditCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));
    }

    public function AdminUpdateCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name' => 'required|max:255'
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('admin.categories')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing To Updated',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.categories')->with($notification);
        }
    }

    public function AdminDeleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
