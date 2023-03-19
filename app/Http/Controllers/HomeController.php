<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

use App\Models\Chef;

use App\Models\Order;



class HomeController extends Controller
{
    
 public function index()
 {

   if(Auth::id())
   {

return redirect('redirects');

   }

else
   //an instance that will be used to fetch data from the food table
   $data = food::all();

   //an instance that will be used to fetch data from the chef table
   $data2 = chef::all();

    return view ('home', compact('data','data2'));
 }


 public function redirects(){

    $data = food::all();

    $data2 = chef::all();

   $usertype = Auth::user()->usertype;

   if($usertype=='1'){

      return view('admin.adminhome');
   }

   else 
   {

      //add and count cart items
     $user_id = Auth::id();
     $count = cart::where('user_id', $user_id)->count();

      return view('home', compact('data', 'data2', 'count'));
   }
 }

 public function viewchef()
 {
     $data = chef::all();
     return view('home', compact('data'));
 }

 public function addcart(Request $request, $id)
 {
if (Auth::id())
{

   //data from add to cart that has to be uploadedinto the database
   $user_id = Auth::id();
   $food_id = $id;
   $quantity = $request->quantity;

   $cart = new cart;
   $cart->user_id = $user_id;
   $cart->food_id = $food_id;
   $cart->quantity = $quantity;

   $cart->save();


   return redirect()->back();
}
else

{
return redirect('/login');
}
 }

public function showcart(Request $request, $id)
{

   //count cart items from the database
  // $count = cart::where('$user_id', $id)->count();


  $count = cart::where('user_id', $id)->count();

  if(Auth::id()==$id)
  {

  //
  $data2=cart::select('*')->where('user_id', '=', $id)->get();


  //to query cart data from the database
  $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

  // return view('showcart', compact('count', '$data'));
  return view('showcart', compact('count', 'data','data2'));

  }

  else
{
 return redirect()->back();
} 

}


public function remove($id)
{

 $data = cart::find($id);

 $data->delete();

 return redirect()->back();

}


public function insertorder(Request $request)
 {
   foreach($request->foodname as $key =>$foodname)

{
  $data = new order;
  $data->foodname = $foodname;

  $data->price=$request->price[$key];
  $data->quantity=$request->quantity[$key];
  $data->name=$request->name;
  $data->phone=$request->phone;
  $data->address=$request->address;

  $data->save();
  
  
 }

 return redirect()->back();
 }
}