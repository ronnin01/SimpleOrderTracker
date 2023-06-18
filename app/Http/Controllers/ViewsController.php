<?php

namespace App\Http\Controllers;

use App\Events\UpdateDeliveryOrder;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{

    // LOGOUT AUTH USER
    public function logout_auth_user(){
        Auth::logout();

        return redirect()->route("signin.page");
    }

    // SIGNIN PAGE
    public function signin_page(){
        return view("signin");
    }

    // REGISTER PAGE
    public function register_page(){
        return view('register');
    }

    // CUSTOMER INDEX PAGE
    public function customer_index_page(){
        return view('customer.index')
        ->with("foods", Foods::all());
    }
    
    // CUSTOMER CART PAGE
    public function customer_cart_page(){
        $count = 1;
        return view("customer.cart")
        ->with("cart", DB::table("carts")->join('foods', 'carts.food_id', "foods.food_id")->orderBy('carts.cart_id', 'DESC')->where("carts.cart_status", "Pending")->where('user_id', auth()->user()->id)->get())
        ->with("count", $count);
    }

    // CUSTOMER ORDER PAGE
    public function customer_order_page(){
        return view("customer.order")
        ->with("order", DB::table('checkouts')->leftJoin('users', 'users.id', 'checkouts.user_id')->leftJoin("foods", "foods.food_id", "checkouts.food_id")->where('checkouts.user_id', auth()->user()->id)->get());
    }

    // ADMIN INDEX PAGE
    public function admin_index_page(){

        $count = 1;
        $orders = array();

        $order = DB::table('checkouts')->leftJoin('users', 'users.id', 'checkouts.user_id')->leftJoin("foods", "foods.food_id", "checkouts.food_id")->get();
        $trimOrders = $order->unique('user_id');

        foreach ($trimOrders as $user) {
            array_push($orders, $user);
        }

        return view('admin.index')
        ->with('orders', $orders)
        ->with('count', $count);
    }

    // ADMIN FOODS PAGE
    public function admin_foods_page(){
        return view('admin.foods')
        ->with("foods", Foods::orderBy('food_id', 'DESC')->get())
        ->with("count", 1);
    }

    // ADMIN ADD FOODS PAGE
    public function admin_add_foods_page(){
        return view('admin.addFoods');
    }

    // ADMIN UPDATE FOOD PAGE
    public function admin_update_food_page($id){
        return view('admin.updateFoods')
        ->with("foods", Foods::where("food_id", $id)->get());
    }

    // ADMIN ORDER STATUS UPDATE PAGE
    public function admin_order_status_update_page($id){

        $status = array(
            0,
            3,
            25,
            50,
            75,
            100
        );
        
        return view("admin.orders")
        ->with('order', DB::table('checkouts')->leftJoin('users', 'users.id', 'checkouts.user_id')->leftJoin("foods", "foods.food_id", "checkouts.food_id")->where('user_id', $id)->get())
        ->with("status", $status);
    }
}
