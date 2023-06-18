<?php

namespace App\Http\Controllers;

use App\Events\UpdateDeliveryOrder;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Foods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $signinRepo;

    public function __construct(){
        
    }

    // SIGN IN POST
    public function signin_post(Request $request){
        
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:6'
        ]);

        $user = User::where("username", $request->get('username'))->first();

        if($user){ // check if there is user from the database

            if($request->get('password') == $user->password){ // check the password if its match

                Auth::login($user);

                if($user->type == "Admin"){
                    return redirect()->route('admin.index.page');
                }else{
                    return redirect()->route('customer.index.page');
                }

            }else{
                Session::flash("error", "Incorrect Password.");
                return back()->withInput();
            }

        }else{
            Session::flash("error", "Incorrect Username.");
            return back()->withInput();
        }

    }

    // REGISTER POST
    public function register_post(Request $request){

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric',
            'username' => 'required|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $newUser = new User();

        $newUser->firstname = $request->get('firstname');
        $newUser->lastname = $request->get('lastname');
        $newUser->address = $request->get('address');
        $newUser->contact_number = $request->get('contact');
        $newUser->username = $request->get('username');
        $newUser->email = $request->get('email');
        $newUser->password = $request->get('password');
        $newUser->type = "Customer";
        $newUser->save();

        // Session::flash("success", "Register Successfully.");

        return redirect()->route('signin.page')->with("success", "Register Successfully.");

    }

    // CUSTOMER ADD FOOD POST
    public function customer_add_order_to_cart_post($id){

        Cart::create([
            "user_id" => auth()->user()->id,
            "food_id" => $id,
            "cart_status"=>"Pending"
        ]);

        return redirect()->route('customer.index.page');
    }

    // CUSTOMER CHECKOUT POST
    public function customer_checkout_post(Request $request){

        for($i = 0; $i < count($request->order_id);$i++){
            Checkout::create([
                "user_id" => auth()->user()->id,
                "food_id" => $request->order_id[$i],
                "total_price" => ($request->order_price[$i] * $request->order_quantity[$i]),
                "total_quantity" => $request->order_quantity[$i],
                "checkout_status" => 0,
            ]);

            $food = Foods::where("food_id", $request->order_id[$i])->first();
            $food->food_quantity = $food->food_quantity - $request->order_quantity[$i];
            $food->save();
        }

        $cart = Cart::where("user_id", auth()->user()->id)->update([
            "cart_status" => "Active"
        ]);

        return redirect()->route("custoomer.cart.page");

    }
    
    // ADMIN ADD FOOD POST
    public function admin_add_food_post(Request $request){

        $request->validate([
            "food_picture" => "required|image",
            "food_name" => "required",
            "food_description" => "required",
            "food_price" => "required|numeric",
            "food_quantity" => "required|numeric"
        ]);

        $input = $request->all();

        if($request->hasFile("food_picture")){

            $destination = "public/images/foods";
            $request->file('food_picture')->storeAs($destination, $request->file('food_picture')->getClientOriginalName());

            $input["food_picture"] = $request->file('food_picture')->getClientOriginalName();
        }

        Foods::create($input);

        return redirect()->route('admin.foods.page')->with("message", "Food added successfuly.");
    }

    // ADMIN UPDATE FOOD POST
    public function admin_update_food_post(Request $request, $id){
        $request->validate([
            "food_picture" => "image",
            "food_name" => "required",
            "food_description" => "required",
            "food_price" => "required|numeric",
            "food_quantity" => "required|numeric"
        ]);

        $input = $request->all();

        if($request->hasFile("food_picture")){
            $destination = "public/images/foods";
            $request->file('food_picture')->storeAs($destination, $request->file('food_picture')->getClientOriginalName());

            $input["food_picture"] = $request->file('food_picture')->getClientOriginalName();
        }else{
            $input["food_picture"] = $input["alter_food_picture"];
        }

        DB::table("foods")->where('food_id', $id)->update([
            "food_picture"=>$input["food_picture"],
            "food_name"=>$input["food_name"],
            "food_description"=>$input["food_description"],
            "food_price"=>$input["food_price"],
            "food_quantity"=>$input["food_quantity"]
        ]);

        return redirect()->route("admin.update.food.page", $id)->with("message", "You successfully update.");
    }

    // ADMIN DELETE FOOD POST
    public function admin_delete_food_post($id){
        Foods::destroy($id);

        return redirect()->route('admin.foods.page')
        ->with("message", "You successfuly delete.");
    }

    // ADMIN CHECKOUT STATUS UPDATE POST
    public function admin_checkout_status_update_post(Request $request){

        DB::table("checkouts")->where('user_id', $request->user_id)->update(["checkout_status"=>$request->checkout_status]);

        event(new UpdateDeliveryOrder($request->user_id, $request->checkout_status));

        return redirect()->route('admin.orders.update.status.page', $request->user_id)->with("message", "Your Delivery Status Updated.");

    }
}
