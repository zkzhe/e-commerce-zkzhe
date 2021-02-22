<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function addWishlist($id)
    {
        $userId = Auth::id();
        $check = DB::table('wishlists')->where('user_id', $userId)->where('product_id', $id)->first();
        $data = array(
            'user_id' => $userId,
            'product_id' => $id,
        );

        if (Auth::check()) {
            if ($check) {
                return response()->json(['error' => 'Product Already Has on your wishlist'], 200);
            } else {
                DB::table('wishlists')->insert($data);
                return response()->json(['success' => 'Product Added on wishlist'], 200);
            }
        } else {
            return response()->json(['error' => 'At first login your account'], 200);
        }
    }
}
