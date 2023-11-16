<?php

use App\Models\Settings;
use App\Models\Catagories;
use App\Models\Shop\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\AdsController;
use App\Http\Controllers\Shop\LangController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Shop\AboutController;
use App\Http\Controllers\Shop\DealsController;
use App\Http\Controllers\Shop\PlansController;
use App\Http\Controllers\Shop\SlideController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Shop\StripeController;
use App\Http\Controllers\Admin\AssignController;
use App\Http\Controllers\Admin\InviteController;
use App\Http\Controllers\Shop\ContactController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\ServiceController;
use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Shop\ShoplistController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CatagoriesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Shop\DealProductController;
use App\Http\Controllers\Shop\ShopdetailsController;
use App\Http\Controllers\Customers\MyorderController;
use App\Http\Controllers\Shop\ProductDetailsController;
use App\Http\Controllers\Shop\ProducttrendingController;
use App\Http\Controllers\Admin\CatagoriesAdminController;
use App\Http\Controllers\Shop\FilterCatagoriesController;
use App\Http\Controllers\CustoProducttrendingControllermers\RegisterController;

/*
|------------------------------------------------- -------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ShopController::class)->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    // Route::resource('register-client', RegisterController::class);
    Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add_to_cart');
    Route::delete('remove-from-cart',[ShopController::class,'remove'])->name('remove_from_cart');
    Route::patch('update-cart',[ShopController::class,'update'])->name('update_cart');
    Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
    Route::get('search',[ShopController::class,'search'])->name('search');
    Route::get('products',[ShopController::class,'product_list'])->name('products');
});

Route::controller(ProducttrendingController::class)->group(function (){
   
    Route::get('/product_trending', 'index')->name('product_trending');
    Route::get('/product_trending', 'sortProduct')->name('product_trending');
    
});

Route::controller(FilterCatagoriesController::class)->group(function (){
   
    Route::get('FilterCatagories', 'index')->name('FilterCatagories');
    Route::get('FilterCatagories', 'show')->name('FilterCatagories');
    
});
   
Route::controller(ProductDetailsController::class)->group(function (){
   
    Route::get('product_details', 'index')->name('product_details');
    Route::get('product_details', 'show')->name('product_details');
    
});

Route::controller(AboutController::class)->group(function (){
   
    Route::get('about', 'index')->name('about');
    
});

Route::controller(ServiceController::class)->group(function (){
   
    Route::get('service', 'index')->name('service');
    
});

Route::controller(ContactController::class)->group(function (){
   
    Route::get('contact', 'index')->name('contact');
    
});

Route::controller(ShoplistController::class)->group(function (){
   
    Route::get('shoplist', 'index')->name('shoplist');
    Route::get('shopdetails/{id}', 'shopdetailcontrol')->name('shopdetails');
    
});


Route::controller(StripeController::class)->group(function () {
    // Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::post('/webhook', [StripeController::class, 'webhook'])->name('webhook');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('/admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/adduser/invite', [AddUserController::class, 'invite_view'])->name('invite_view');

    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::post('/adduser/invite', [AddUserController::class, 'invite'])->name('adduser.invite');
    
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/adduser', AddUserController::class);
    Route::resource('/catagories', CatagoriesAdminController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/slide', SlideController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/adevert', AdsController::class);   //
    Route::resource('/settings', SettingsController::class);
    Route::resource('/plans', PlansController::class);
    Route::get('/update-deal',[ProductController::class,'dealupdate'])->name('update_deal');
    Route::get('/disable-deal',[ProductController::class,'dealdisable'])->name('disable_deal');
    Route::get('/changeStatus', [CatagoriesAdminController::class, 'changeStatus'])->name('changeStatus');
    Route::get('searchforproducts',[SettingsController::class,'searchproducts'])->name('searchforproducts');
    Route::get('searchfororders',[SettingsController::class,'searchorders'])->name('searchfororders');
    Route::get('searchforcategories',[SettingsController::class,'searchcategories'])->name('searchforcategories');
});

Route::middleware(['auth', 'role:users'])->name('user.')->prefix('/user')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::resource('/service', ServiceController::class);
    Route::resource('/catagories', CatagoriesController::class);
});

Route::middleware(['auth', 'role:customers'])->name('customers.')->prefix('/customers')->group(function() {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('whishList', [ShopController::class, 'whishList'])->name('whishList');
    Route::get('myorder', [MyorderController::class, 'index'])->name('myorder');
    // Route::get('add-rating', [RatingController::class, 'add']);
    Route::post('session', [StripeController::class, 'session'])->name('session');
    Route::get('success', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::post('/review', [ShopController::class, 'review'])->name('review');

});


require __DIR__.'/auth.php';