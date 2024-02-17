<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sss', function () {
    return view('welcome');
});

Route::get('/dashboard',[HomeController::class,'dashboard']

)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/image/update',[HomeController::class,'profile_image'])->name('profile.image');
//user list
Route::get('/user/list',[UserController::class,'user_list'])->name('user.list');
Route::get('/user/delete/{id}',[UserController::class,'user_delete'])->name('user.delete');
//category
Route::get('/category',[CategoryController::class,'category_view'])->name('category');
Route::post('/category/store',[CategoryController::class,'category_store'])->name('category.store');
//subcategory
Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
Route::post('/subcategory/store',[SubcategoryController::class,'subcategory_store'])->name('subcategory.store');
//brand
Route::get('/brand',[BrandController::class,'brand'])->name('brand');
Route::post('/brand',[BrandController::class,'brand_store'])->name('brand.store');
//product
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::post('/getsubcategory',[ProductController::class,'getsubcategory']);
Route::post('/changeStatus',[ProductController::class,'changeStatus']);
Route::post('/product_store',[ProductController::class,'product_store'])->name('product.store');
Route::get('/product/list',[ProductController::class,'product_list'])->name('product.list');
//Inventorycontroller
Route::get('/variation',[InventoryController::class,'variation'])->name('variation');
Route::post('/color/store',[InventoryController::class,'color'])->name('color.store');
Route::post('/size/store',[InventoryController::class,'size'])->name('size.store');
Route::get('/Inventory/{id}',[InventoryController::class,'inventory'])->name('inventory');
Route::post('/Inventory/{id}',[InventoryController::class,'inventory_store'])->name('inventory.store');
Route::get('/',[FrontendController::class,'index'])->name('index');

require __DIR__.'/auth.php';
