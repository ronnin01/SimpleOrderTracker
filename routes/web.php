<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

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

// LOGOUT ROUTE
Route::get('/logout', [ViewsController::class, 'logout_auth_user'])->name("logout");
// CUSTOMER INDEX VIEW ROUTE
Route::get('/', [ViewsController::class, 'customer_index_page'])->name('customer.index.page');
// SIGNIN VIEW ROUTE
Route::get('/signin', [ViewsController::class, "signin_page"])->name("signin.page");
// SIGNIN POST ROUTE
Route::post('/signin/post', [PostController::class, 'signin_post'])->name("signin.post");
// REGISTER VIEW ROUTE
Route::get('/register', [ViewsController::class, 'register_page'])->name('register.page');
// REGISTER POST ROUTE
Route::post('/register/post', [PostController::class, 'register_post'])->name("register.post");

Route::group(["prefix"=>"customer", "middleware"=>"customer.auth"], function(){
    Route::get("/add/order/cart/{id}", [PostController::class, "customer_add_order_to_cart_post"])->name('customer.add.order.to.cart.post');
    Route::get("/cart", [ViewsController::class, 'customer_cart_page'])->name("custoomer.cart.page");
    Route::get("/order", [ViewsController::class, 'customer_order_page'])->name("customer.order.page");
    Route::post("/checkout/post", [PostController::class, 'customer_checkout_post'])->name("customer.checkout.post");
});

// ADMIN ROUTES
Route::group(["prefix"=>"admin", "middleware"=>"login.auth"], function(){
    Route::get("/index", [ViewsController::class, "admin_index_page"])->name("admin.index.page");
    Route::get("/foods", [ViewsController::class, "admin_foods_page"])->name("admin.foods.page");
    Route::get('/foods/add', [ViewsController::class, "admin_add_foods_page"])->name('admin.add.foods.page');
    Route::post('/foods/add/post', [PostController::class, "admin_add_food_post"])->name('admin.add.foods.post');
    Route::get("/foods/update/{id}", [ViewsController::class, "admin_update_food_page"])->name("admin.update.food.page");
    Route::post("/foods/update/{id}", [PostController::class, "admin_update_food_post"])->name("admin.update.food.post");
    Route::delete("/foods/delete/{id}", [PostController::class, "admin_delete_food_post"])->name("admin.delete.food.post");
    Route::get("/foods/orders/{id}", [ViewsController::class, "admin_order_status_update_page"])->name("admin.orders.update.status.page");
    Route::post("/foods/update/order", [PostController::class, "admin_checkout_status_update_post"])->name("admin.orders.update.status.post");
});
