<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\Chef;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function user()
    {
      $data = User::all();
        return view('admin.users', compact('data'));
    }



    public function deleteuser($id)
    {
      $data = User::find($id);
      $data->delete();
        return redirect()->back();
    }


    public function foodmenu()
    {
      
      $data = food::all();
        return view('admin.foodmenu', compact('data'));

    }

    public function upload(Request $request)
    {

      //an instance or objet used to get input from the form and 
      //upload the data into the database( INTO food TABLE)
      $data = new food;

  
$image = $request->image;
$imagename = time().'.'.$image->getClientOriginalExtension();
$request->image->move('foodimage', $imagename);
$data->image = $imagename;

//incase of request on title, price and description data
$data->title = $request->title;
$data->price = $request->price;
$data->description = $request->description;

//save the data and return redirect back
$data->save();
return redirect()->back();
    }

    public function deletemenu($id)
    {
      $data = food::find($id);
      $data->delete();
        return redirect()->back();
    }

    public function updateview($id)
    {
      $data = food::find($id);
      
      return view("admin.updateview", compact("data"));
        return redirect()->back()->with('food updated successfuly');
    }

    public function update(Request $request, $id)
    {
      $data = food::find($id);
      $image = $request->image;

      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('foodimage', $imagename);
      $data->image = $imagename;
      
      $data->title = $request->title;
      $data->price = $request->price;
      $data->description = $request->description;
      

      $data->save();
      return redirect()->back();
    }

    public function reservation(Request $request)
    {
      $data = new reservation;

      $data->name = $request->name;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->guest = $request->guest;
      $data->date = $request->date;
      $data->time = $request->time;
      $data->message = $request->message;
      
      $data->save();
      return redirect()->back();
    }

    public function viewreservation()
    {

      if(Auth::id())
      {
      $data = reservation::all();
      return view ('admin.adminreservation', compact('data'));
      }

      else
      {
         return redirect ('login');
      }
    }

    public function addchef()
    {
      
      $data = chef::all();
      return view("admin.adminchef", compact("data"));

    }

    public function uploadchef(Request $request)
    {
      $data = new chef;
      
      //For uploading image using an instance $image
      $image = $request->image;

      //a method used to get the extension of the uploaded image/file
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('chefimage', $imagename);
      $data->image = $imagename;

      $data->name = $request->name;
      $data->speciality = $request->speciality;
      
      $data->save();
      return redirect()->back();
    }

 public function deletechef($id)
 {
   $data = chef::find($id);
   $data->delete();
   return redirect()->back();
 }

 public function updatechefview($id)
 {
    $data = chef::find($id);
  return view('admin.updatechefview', compact('data'));

 }

 public function updatechef(Request $request, $id)
 {
  $data = chef::find($id);
  $image = $request->image;

  if($image)
{
  $imagename = time().'.'.$image->getClientOriginalExtension();
  $request->image->move('chefimage', $imagename);
  $data->image = $imagename;
 }
  $data->name = $request->name;
  $data->speciality = $request->speciality;
  
  

  $data->save();
  return redirect()->back();
 }

 public function orders()
 {

  $data = order::all();
  return view('admin.vieworders', compact('data'));
 }


 //the search function
 public function search(Request $request)
 {

  $search = $request->search;
  $data = order::where('name','like','%'.$search.'%')->orWhere('foodname','like','%'.$search.'%')
  ->get();
  return view('admin.vieworders', compact('data'));
 }

 
}
