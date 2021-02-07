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

Route::get('/admin/categories', [CategoryController::class, 'AdminCategory'])->name('admin.categories');
Route::post('/admin/store/category', [CategoryController::class, 'AdminStoreCategory'])->name('admin.store.category');
Route::get('/admin/edit/category/{id}', [CategoryController::class, 'AdminEditCategory']);
Route::post('/admin/update/category/{id}', [CategoryController::class, 'AdminUpdateCategory']);
Route::get('/admin/delete/category/{id}', [CategoryController::class, 'AdminDeleteCategory']);

Route::get('/admin/brands', [BrandController::class, 'Adminbrand'])->name('admin.brands');
Route::post('/admin/store/brand', [BrandController::class, 'AdminStoreBrand'])->name('admin.store.brand');
Route::get('/admin/edit/brand/{id}', [BrandController::class, 'AdminEditBrand']);
Route::post('/admin/update/brand/{id}', [BrandController::class, 'AdminUpdateBrand']);
Route::get('/admin/delete/brand/{id}', [BrandController::class, 'AdminDeleteBrand']);

Route::get('/admin/subcategories', [SubCategoryController::class, 'AdminSubcategories'])->name('admin.sub.categories');
Route::post('/admin/store/subcategory', [SubCategoryController::class, 'AdminStoreSubcategory'])->name('admin.store.subcategories');
Route::get('/admin/edit/subcategory/{id}', [SubCategoryController::class, 'AdminEditSubcategory']);
Route::post('/admin/update/subcategory/{id}', [SubCategoryController::class, 'AdminUpdateSubcategory']);
Route::get('/admin/delete/subcategory/{id}', [SubCategoryController::class, 'AdminDeleteSubcategory']);

Route::get('/admin/coupon', [CouponController::class, 'AdminCoupon'])->name('admin.coupon');
Route::post('/admin/store/coupon', [CouponController::class, 'AdminStoreCoupon'])->name('admin.store.coupon');
Route::get('/admin/edit/coupon/{id}', [CouponController::class, 'AdminEditCoupon']);
Route::post('/admin/update/coupon/{id}', [CouponController::class, 'AdminUpdateCoupon']);
Route::get('/admin/delete/coupon/{id}', [CouponController::class, 'AdminDeleteCoupon']);

Route::get('/admin/newslater', [CouponController::class, 'AdminNewslater'])->name('admin.newslater');

Route::post('/store/newslater', [FrontController::class, 'StoreNewslater'])->name('store.newslater');
Route::get('/delete/newslater/{id}', [FrontController::class, 'DeleteNewslater']);
