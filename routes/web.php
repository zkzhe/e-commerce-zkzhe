<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as PublicProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');



// User All Routes
Route::get('/user/logout', [MainUserController::class, 'Logout'])->name('user.logout');
Route::get('/user/profile', [MainUserController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/profile/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
Route::post('/user/profile/store', [MainUserController::class, 'UserProfileStore'])->name('profile.store');
Route::get('/user/password/view', [MainUserController::class, 'UserPasswordView'])->name('user.password.view');
Route::post('/user/password/update', [MainUserController::class, 'UserPasswordUpdate'])->name('password.update');

// Admin All Routes
Route::get('/admin/profile', [MainAdminController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [MainAdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/password/update', [MainAdminController::class, 'AdminChangePasswordUpdate'])->name('admin.password.update');
Route::post('/admin/password/update', [MainAdminController::class, 'AdminChangePasswordUpdate'])->name('admin.password.update');
//categories
Route::get('/admin/categories', [CategoryController::class, 'AdminCategory'])->name('admin.categories');
Route::post('/admin/store/category', [CategoryController::class, 'AdminStoreCategory'])->name('admin.store.category');
Route::get('/admin/edit/category/{id}', [CategoryController::class, 'AdminEditCategory']);
Route::post('/admin/update/category/{id}', [CategoryController::class, 'AdminUpdateCategory']);
Route::get('/admin/delete/category/{id}', [CategoryController::class, 'AdminDeleteCategory']);
//brands
Route::get('/admin/brands', [BrandController::class, 'Adminbrand'])->name('admin.brands');
Route::post('/admin/store/brand', [BrandController::class, 'AdminStoreBrand'])->name('admin.store.brand');
Route::get('/admin/edit/brand/{id}', [BrandController::class, 'AdminEditBrand']);
Route::post('/admin/update/brand/{id}', [BrandController::class, 'AdminUpdateBrand']);
Route::get('/admin/delete/brand/{id}', [BrandController::class, 'AdminDeleteBrand']);
//subcategories
Route::get('/admin/subcategories', [SubCategoryController::class, 'AdminSubcategories'])->name('admin.sub.categories');
Route::post('/admin/store/subcategory', [SubCategoryController::class, 'AdminStoreSubcategory'])->name('admin.store.subcategories');
Route::get('/admin/edit/subcategory/{id}', [SubCategoryController::class, 'AdminEditSubcategory']);
Route::post('/admin/update/subcategory/{id}', [SubCategoryController::class, 'AdminUpdateSubcategory']);
Route::get('/admin/delete/subcategory/{id}', [SubCategoryController::class, 'AdminDeleteSubcategory']);
//coupon
Route::get('/admin/coupon', [CouponController::class, 'AdminCoupon'])->name('admin.coupon');
Route::post('/admin/store/coupon', [CouponController::class, 'AdminStoreCoupon'])->name('admin.store.coupon');
Route::get('/admin/edit/coupon/{id}', [CouponController::class, 'AdminEditCoupon']);
Route::post('/admin/update/coupon/{id}', [CouponController::class, 'AdminUpdateCoupon']);
Route::get('/admin/delete/coupon/{id}', [CouponController::class, 'AdminDeleteCoupon']);
//newslater
Route::get('/admin/newslater', [CouponController::class, 'AdminNewslater'])->name('admin.newslater');
Route::post('/store/newslater', [FrontController::class, 'StoreNewslater'])->name('store.newslater');
Route::get('/delete/newslater/{id}', [FrontController::class, 'DeleteNewslater']);
//product
Route::get('/admin/product/all', [ProductController::class, 'index'])->name('all.product');
Route::get('/admin/product/add', [ProductController::class, 'create'])->name('add.product');
Route::get('/admin/get/subcategory/{subcategory_id}', [ProductController::class, 'GetSubcat']);
Route::post('/admin/store/product', [ProductController::class, 'store'])->name('store.product');
Route::get('/admin/edit/product/{id}', [ProductController::class, 'EditProduct']);
Route::post('/admin/update/product/withoutphoto/{id}', [ProductController::class, 'UpdateProductWithoutphoto']);
Route::post('/admin/update/product/photo/{id}', [ProductController::class, 'UpdateProductPhoto']);
Route::get('/admin/delete/product/{id}', [ProductController::class, 'DeleteProduct']);
Route::get('/admin/view/product/{id}', [ProductController::class, 'ViewProduct']);
Route::get('/admin/inactive/product/{id}', [ProductController::class, 'Inactive']);
Route::get('/admin/active/product/{id}', [ProductController::class, 'Active']);
//Blog
Route::get('/admin/blog/category/list', [PostController::class, 'BlogCategoryList'])->name('add.blog.categorylist');
Route::post('/admin/store/blog', [PostController::class, 'BlogCategoryStore'])->name('admin.store.blog.category');
Route::get('/admin/delete/blogcategory/{id}', [PostController::class, 'DeleteBlogCategory']);
Route::get('/admin/edit/blogcategory/{id}', [PostController::class, 'EditBlogCategory']);
Route::post('/admin/update/blog/category/{id}', [PostController::class, 'UpdateBlogCategory']);

Route::get('/admin/add/post/', [PostController::class, 'Create'])->name('add.blogpost');
Route::post('/admin/store/post', [PostController::class, 'Store'])->name('store.blogpost');
Route::get('/admin/all/post/', [PostController::class, 'index'])->name('all.blogpost');
Route::get('/admin/edit/post/{id}', [PostController::class, 'EditBlogpost']);
Route::post('/admin/update/post/{id}', [PostController::class, 'UpdateBlogpost']);
Route::get('/admin/delete/post/{id}', [PostController::class, 'DeleteBlogpost']);

//Wishlist
Route::get('/add/wishlist/{id}', [WishlistController::class, 'addWishlist']);

//Carts
Route::get('/add/to/cart/{id}', [CartController::class, 'addCart']);
Route::get('/check', [CartController::class, 'check']);
Route::get('/product/cart/', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/remove/cart/{rowId}', [CartController::class, 'removeCart']);
Route::post('/update/cart/item/', [CartController::class, 'updateCart'])->name('update.cartitem');
Route::get('/product/details/{id}/{product_name}', [PublicProductController::class, 'productView']);
Route::post('/cart/product/add/{id}/', [PublicProductController::class, 'addCart']);
Route::get('/cart/product/view/{id}/', [CartController::class, 'viewProduct']);
Route::post('/insert/into/cart/', [CartController::class, 'insertCart'])->name('insert.into.cart');
Route::get('/user/checkout/', [CartController::class, 'checkout'])->name('user.checkout');
Route::get('/user/wishlist/', [CartController::class, 'wishlist'])->name('user.wishlist');
Route::post('/user/apply/coupon/', [CartController::class, 'coupon'])->name('apply.coupon');
Route::get('/coupon/remove', [CartController::class, 'couponRemove'])->name('coupon.remove');

//Blog
Route::get('/blog/post/', [BlogController::class, 'blog'])->name('blog.post');
Route::get('/language/english/', [BlogController::class, 'english'])->name('language.english');
Route::get('/language/taiwan/', [BlogController::class, 'taiwan'])->name('language.taiwan');
Route::get('/blog/single/{id}', [BlogController::class, 'blogSingle']);

//Payment Step
Route::get('/payment/step/', [CartController::class, 'PaymentPage'])->name('payment.step');
Route::post('/user/payment/process/', [PaymentController::class, 'payment'])->name('payment.process');
Route::post('/user/stripe/charge/', [PaymentController::class, 'stripeCharge'])->name('stripe.charge');

//Product details Page
Route::get('/products/{id}', [PublicProductController::class, 'productsView']);
Route::get('/allcategory/{id}', [PublicProductController::class, 'categoryView']);

//Admin Order
Route::get('/admin/pading/order/', [OrderController::class, 'newOrder'])->name('admin.neworder');
Route::get('/admin/accept/payment/', [OrderController::class, 'acceptPayment'])->name('admin.accept.payment');
Route::get('/admin/cancel/order/', [OrderController::class, 'cancelOrder'])->name('admin.cancel.order');
Route::get('/admin/process/payment/', [OrderController::class, 'processPayment'])->name('admin.process.payment');
Route::get('/admin/success/payment/', [OrderController::class, 'successPayment'])->name('admin.success.payment');

Route::get('/admin/view/order/{id}', [OrderController::class, 'viewOrder']);
Route::get('/admin/payment/accept/{id}', [OrderController::class, 'paymentAccept']);
Route::get('/admin/payment/cancel/{id}', [OrderController::class, 'paymentCancel']);
Route::get('/admin/delevery/process/{id}', [OrderController::class, 'deleveryProcess']);
Route::get('/admin/delevery/done/{id}', [OrderController::class, 'deleveryDone']);

//SEO Setting
Route::get('/admin/seo/', [OrderController::class, 'seo'])->name('admin.seo');
Route::post('/admin/update/seo/', [OrderController::class, 'updateSeo'])->name('admin.update.seo');

//Order Tracking
Route::post('/order/tracking/', [FrontController::class, 'orderTracking'])->name('order.tracking');

//Order Report
Route::get('/admin/today/order/', [ReportController::class, 'todayOrder'])->name('today.order');
Route::get('/admin/today/delivery/', [ReportController::class, 'todayDelivery'])->name('today.delivery');
Route::get('/admin/this/month', [ReportController::class, 'thisMonth'])->name('this.month');
Route::get('/admin/search/report', [ReportController::class, 'search'])->name('search.report');
Route::post('/admin/search/by/year', [ReportController::class, 'searchByYear'])->name('search.by.year');
Route::post('/admin/search/by/month', [ReportController::class, 'searchByMonth'])->name('search.by.month');
Route::post('/admin/search/by/date', [ReportController::class, 'searchByDate'])->name('search.by.date');
