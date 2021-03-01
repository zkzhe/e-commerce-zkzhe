<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newOrder()
    {
        $order = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function viewOrder($id)
    {

        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->where('orders.id', $id)
            ->first();
        // dd($order);

        $shipping = DB::table('shipping')->where('order_id', $id)->first();
        // dd($shipping);

        $details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.product_code', 'products.image_one')
            ->where('orders_details.order_id', $id)
            ->get();
        // dd($details);
        return view('admin.order.view_order', compact('order', 'shipping', 'details'));
    }

    public function paymentAccept($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Payment Accept Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.accept.payment')->with($notification);
    }


    public function paymentCancel($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 4]);
        $notification = array(
            'message' => 'Order Cancel',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.cancel.order')->with($notification);
    }

    public function acceptPayment()
    {
        $order = DB::table('orders')->where('status', 1)->get();
        // dd($order);
        return view('admin.order.pending', compact('order'));
    }

    public function cancelOrder()
    {
        $order = DB::table('orders')->where('status', 4)->get();
        // dd($order);
        return view('admin.order.pending', compact('order'));
    }


    public function processPayment()
    {
        $order = DB::table('orders')->where('status', 2)->get();
        // dd($order);
        return view('admin.order.pending', compact('order'));
    }



    public function successPayment()
    {
        $order = DB::table('orders')->where('status', 3)->get();
        // dd($order);
        return view('admin.order.pending', compact('order'));
    }



    public function deleveryProcess($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 2]);
        $notification = array(
            'message' => 'Send To Delivery',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.process.payment')->with($notification);
    }

    public function deleveryDone($id)
    {

        $product = DB::table('orders_details')->where('order_id', $id)->get();
        foreach ($product as $row) {
            DB::table('products')
                ->where('id', $row->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity-' . $row->quantity)]);
        }

        DB::table('orders')->where('id', $id)->update(['status' => 3]);
        $notification = array(
            'message' => 'Product Delivery Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.success.payment')->with($notification);
    }

    public function seo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.coupon.seo', compact('seo'));
    }


    public function updateSeo(Request $request)
    {
        $id = $request->id;

        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analytics;
        DB::table('seo')->where('id', $id)->Update($data);
        $notification = array(
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
