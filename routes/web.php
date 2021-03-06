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
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialController;

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

//Socialite
Route::get('/auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('/callback/google', [SocialController::class, 'handleCallback']);

Route::get('/', function () {
    return view('pages.index');
})->name('/');

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
Route::prefix('user')->group(function () {
    Route::get('logout', [MainUserController::class, 'Logout'])->name('user.logout');
    Route::get('profile', [MainUserController::class, 'UserProfile'])->name('user.profile');
    Route::get('profile/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
    Route::post('profile/store', [MainUserController::class, 'UserProfileStore'])->name('profile.store');
    Route::get('password/view', [MainUserController::class, 'UserPasswordView'])->name('user.password.view');
    Route::post('password/update', [MainUserController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

// Admin All Routes
Route::prefix('admin')->group(function () {
    Route::get('profile', [MainAdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('profile/edit', [MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('profile/store', [MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('change/password', [MainAdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('password/update', [MainAdminController::class, 'AdminChangePasswordUpdate'])->name('admin.password.update');

    //categories
    Route::get('categories', [CategoryController::class, 'AdminCategory'])->name('admin.categories');
    Route::post('store/category', [CategoryController::class, 'AdminStoreCategory'])->name('admin.store.category');
    Route::get('edit/category/{id}', [CategoryController::class, 'AdminEditCategory']);
    Route::post('update/category/{id}', [CategoryController::class, 'AdminUpdateCategory']);
    Route::get('delete/category/{id}', [CategoryController::class, 'AdminDeleteCategory']);

    //brands
    Route::get('brands', [BrandController::class, 'Adminbrand'])->name('admin.brands');
    Route::post('store/brand', [BrandController::class, 'AdminStoreBrand'])->name('admin.store.brand');
    Route::get('edit/brand/{id}', [BrandController::class, 'AdminEditBrand']);
    Route::post('update/brand/{id}', [BrandController::class, 'AdminUpdateBrand']);
    Route::get('delete/brand/{id}', [BrandController::class, 'AdminDeleteBrand']);

    //subcategories
    Route::get('subcategories', [SubCategoryController::class, 'AdminSubcategories'])->name('admin.sub.categories');
    Route::post('store/subcategory', [SubCategoryController::class, 'AdminStoreSubcategory'])->name('admin.store.subcategories');
    Route::get('edit/subcategory/{id}', [SubCategoryController::class, 'AdminEditSubcategory']);
    Route::post('update/subcategory/{id}', [SubCategoryController::class, 'AdminUpdateSubcategory']);
    Route::get('delete/subcategory/{id}', [SubCategoryController::class, 'AdminDeleteSubcategory']);

    //coupon
    Route::get('coupon', [CouponController::class, 'AdminCoupon'])->name('admin.coupon');
    Route::post('store/coupon', [CouponController::class, 'AdminStoreCoupon'])->name('admin.store.coupon');
    Route::get('edit/coupon/{id}', [CouponController::class, 'AdminEditCoupon']);
    Route::post('update/coupon/{id}', [CouponController::class, 'AdminUpdateCoupon']);
    Route::get('delete/coupon/{id}', [CouponController::class, 'AdminDeleteCoupon']);

    //product
    Route::get('product/all', [ProductController::class, 'index'])->name('all.product');
    Route::get('product/add', [ProductController::class, 'create'])->name('add.product');
    Route::get('get/subcategory/{subcategory_id}', [ProductController::class, 'GetSubcat']);
    Route::post('store/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('edit/product/{id}', [ProductController::class, 'EditProduct']);
    Route::post('update/product/withoutphoto/{id}', [ProductController::class, 'UpdateProductWithoutphoto']);
    Route::post('update/product/photo/{id}', [ProductController::class, 'UpdateProductPhoto']);
    Route::get('delete/product/{id}', [ProductController::class, 'DeleteProduct']);
    Route::get('view/product/{id}', [ProductController::class, 'ViewProduct']);
    Route::get('inactive/product/{id}', [ProductController::class, 'Inactive']);
    Route::get('active/product/{id}', [ProductController::class, 'Active']);

    //Blog
    Route::get('blog/category/list', [PostController::class, 'BlogCategoryList'])->name('add.blog.categorylist');
    Route::post('store/blog', [PostController::class, 'BlogCategoryStore'])->name('admin.store.blog.category');
    Route::get('delete/blogcategory/{id}', [PostController::class, 'DeleteBlogCategory']);
    Route::get('edit/blogcategory/{id}', [PostController::class, 'EditBlogCategory']);
    Route::post('update/blog/category/{id}', [PostController::class, 'UpdateBlogCategory']);

    Route::get('add/post/', [PostController::class, 'Create'])->name('add.blogpost');
    Route::post('store/post', [PostController::class, 'Store'])->name('store.blogpost');
    Route::get('all/post/', [PostController::class, 'index'])->name('all.blogpost');
    Route::get('edit/post/{id}', [PostController::class, 'EditBlogpost']);
    Route::post('update/post/{id}', [PostController::class, 'UpdateBlogpost']);
    Route::get('delete/post/{id}', [PostController::class, 'DeleteBlogpost']);

    //Admin Order
    Route::get('pading/order/', [OrderController::class, 'newOrder'])->name('admin.neworder');
    Route::get('accept/payment/', [OrderController::class, 'acceptPayment'])->name('admin.accept.payment');
    Route::get('cancel/order/', [OrderController::class, 'cancelOrder'])->name('admin.cancel.order');
    Route::get('process/payment/', [OrderController::class, 'processPayment'])->name('admin.process.payment');
    Route::get('success/payment/', [OrderController::class, 'successPayment'])->name('admin.success.payment');

    Route::get('view/order/{id}', [OrderController::class, 'viewOrder']);
    Route::get('payment/accept/{id}', [OrderController::class, 'paymentAccept']);
    Route::get('payment/cancel/{id}', [OrderController::class, 'paymentCancel']);
    Route::get('delevery/process/{id}', [OrderController::class, 'deleveryProcess']);
    Route::get('delevery/done/{id}', [OrderController::class, 'deleveryDone']);

    //SEO Setting
    Route::get('seo', [OrderController::class, 'seo'])->name('admin.seo');
    Route::post('update/seo', [OrderController::class, 'updateSeo'])->name('admin.update.seo');

    //Order Report
    Route::get('today/order/', [ReportController::class, 'todayOrder'])->name('today.order');
    Route::get('today/delivery/', [ReportController::class, 'todayDelivery'])->name('today.delivery');
    Route::get('this/month', [ReportController::class, 'thisMonth'])->name('this.month');
    Route::get('search/report', [ReportController::class, 'search'])->name('search.report');
    Route::post('search/by/year', [ReportController::class, 'searchByYear'])->name('search.by.year');
    Route::post('search/by/month', [ReportController::class, 'searchByMonth'])->name('search.by.month');
    Route::post('search/by/date', [ReportController::class, 'searchByDate'])->name('search.by.date');
});


//newslater
Route::get('/admin/newslater', [CouponController::class, 'AdminNewslater'])->name('admin.newslater');
Route::post('/store/newslater', [FrontController::class, 'StoreNewslater'])->name('store.newslater');
Route::get('/delete/newslater/{id}', [FrontController::class, 'DeleteNewslater']);
Route::delete('/deleteall', [CouponController::class, 'deleteAll'])->name('deleteall');


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
Route::post('/user/oncash/charge/', [PaymentController::class, 'onCash'])->name('oncash.charge');
Route::post('/user/oncash/ecpay/', [PaymentController::class, 'ecPayCharge'])->name('ecpay.charge');

//Product details Page
Route::get('/products/{id}', [PublicProductController::class, 'productsView']);
Route::get('/allcategory/{id}', [PublicProductController::class, 'categoryView']);





//Order
Route::get('/order/view/{statusCode}', [FrontController::class, 'orderView'])->name('order.view');
Route::post('/order/tracking/', [FrontController::class, 'orderTracking'])->name('order.tracking');



//Admin Role
Route::get('/admin/all/user', [UserRoleController::class, 'userRole'])->name('admin.all.user');
Route::get('/admin/create/admin', [UserRoleController::class, 'userCreate'])->name('create.admin');
Route::post('/admin/store/admin', [UserRoleController::class, 'userStore'])->name('store.admin');
Route::get('/edit/admin/{id}', [UserRoleController::class, 'userEdit']);
Route::get('/delete/admin/{id}', [UserRoleController::class, 'userDelete']);
Route::post('/admin/update/admin', [UserRoleController::class, 'userUpdate'])->name('update.admin');

//Admin Site Setting Route
Route::get('/admin/site/setting', [SettingController::class, 'siteSetting'])->name('admin.site.setting');
Route::post('/admin/update/sitesetting', [SettingController::class, 'updateSiteSetting'])->name('update.sitesetting');

//Return Order
Route::get('/success/orderlist/', [PaymentController::class, 'successList'])->name('success.orderlist');
Route::get('/request/return/{id}/', [PaymentController::class, 'requestReturn']);
Route::get('/admin/return/request/', [ReturnController::class, 'returnRequest'])->name('admin.return.request');
Route::get('/admin/all/request/', [ReturnController::class, 'allReturn'])->name('admin.all.request');
Route::get('/admin/approve/return/{id}/', [ReturnController::class, 'approveReturn']);

//Order Stock
Route::get('/admin/product/stock/', [UserRoleController::class, 'productStock'])->name('admin.product.stock');

//Contact page
Route::get('/contact/page/', [ContactController::class, 'contact'])->name('contact.page');
Route::post('/contact/form/', [ContactController::class, 'contactForm'])->name('contact.form');
Route::get('/admin/all/message/', [ContactController::class, 'allMessage'])->name('all.message');

//Search
Route::post('/product/search/', [CartController::class, 'search'])->name('product.search');
