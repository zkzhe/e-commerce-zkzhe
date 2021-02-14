<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function BlogCategoryList()
    {
        $blogCat = DB::table('post_category')->get();
        return view('admin.blog.category.index', compact('blogCat'));
    }

    public function BlogCategoryStore(Request $request)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_tw' => 'required|max:255'
        ]);
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_tw'] = $request->category_name_tw;
        DB::table('post_category')->insert($data);
        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        DB::table('post_category')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }


    public function EditBlogCategory($id)
    {
        $blogCatEdit = DB::table('post_category')->where('id', $id)->first();
        return view('admin.blog.category.edit', compact('blogCatEdit'));
    }

    public function UpdateBlogCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'category_name_en' => 'required|max:255',
            'category_name_tw' => 'required|max:255'
        ]);

        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_tw'] = $request->category_name_tw;
        $update = DB::table('post_category')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('add.blog.categorylist')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing To Updated',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function Create()
    {
        $blogCategory = DB::table('post_category')->get();
        return view('admin.blog.create', compact('blogCategory'));
    }


    public function Store(Request $request)
    {
        $data = array();
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_tw'] = $request->post_title_tw;
        $data['category_id'] = $request->category_id;
        $data['details_en'] = $request->details_en;
        $data['details_tw'] = $request->details_tw;

        $post_image = $request->post_image;
        if ($post_image) {
            $post_image_name = hexdec(uniqid()) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 200)->save('media/post/' . $post_image_name);
            $data['post_image'] = 'media/post/' . $post_image_name;
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $data['post_image'] = '';
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post Inserted Successfully But Without Image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
