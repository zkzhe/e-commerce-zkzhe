<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function AdminCoupon()
    {
        $coupons = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupons'));
    }

    public function AdminStoreCoupon(Request $request)
    {
        $validateData = $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
        ]);
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function AdminEditCoupon($id)
    {
        $coupons = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon', compact('coupons'));
    }

    public function AdminUpdateCoupon(Request $request, $id)
    {
        $validateData = $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
        ]);

        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        $update = DB::table('coupons')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Coupon Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('admin.coupon')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing To Updated',
                'alert-type' => 'error',
            );
            return Redirect()->route('admin.coupon')->with($notification);
        }
    }

    public function AdminDeleteCoupon($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function AdminNewslater()
    {
        $newslaters = DB::table('newslaters')->get();
        return view('admin.coupon.newslater', compact('newslaters'));
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');

        $dbs = DB::delete('delete from newslaters where id in (' . implode(',', $ids) . ')');

        $notification = array(
            'message' => 'All Data Deleted Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
