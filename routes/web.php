<?php

use App\Http\Livewire\Admin\AdminAddAttributeProductComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminAttributeProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCouponComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditAttributeProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CkeckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('product.cart');

Route::get('/checkout',CkeckoutComponent::class)->name('checkout');

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}/{subcategory_slug?}',CategoryComponent::class)->name('product.categoy');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/wishlist',WishlistComponent::class)->name('wishlist');

Route::get('/thank.you',ThankyouComponent::class)->name('thank.you');

Route::get('/contact',ContactComponent::class)->name('contact');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//for user or customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

Route::get('/user/order',UserOrderComponent::class)->name('user.order');
Route::get('/user/oder-details/{order_id}',UserOrderDetailsComponent::class)->name('user.order-details');

Route::get('user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');

Route::get('user/change-password',UserChangePasswordComponent::class)->name('user.change-password');

Route::get('/user/profile',UserProfileComponent::class)->name('user.profile');
Route::get('/user/profile/Edit',UserEditProfileComponent::class)->name('user.edit-profile');
});

//for Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('amin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{subcategory_slug?}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addslider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.editslider');

    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');

    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupon',AdminCouponComponent::class)->name('admin.coupon');
    Route::get('/admin/add/coupon',AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');

    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');

Route::get('/admin/order-details/{order_id}',AdminOrderDetailsComponent::class)->name('admin.order-details');

Route::get('admin/contact',AdminContactComponent::class)->name('admin.contact');

Route::get('/admin/setting',AdminSettingComponent::class)->name('admin.setting');

Route::get('/admin/attrebute-product',AdminAttributeProductComponent::class)->name('admin.attrebute-product');
Route::get('/admin/attrebute-product/add',AdminAddAttributeProductComponent::class)->name('admin.add-attrebute-product');
Route::get('/admin/attrebute-product/edit/{attrebute_id}',AdminEditAttributeProductComponent::class)->name('admin.Edit-attrebute-product');
});
