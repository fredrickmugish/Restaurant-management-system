<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

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

      //get request from the image 'name' input field
      $image = $request->image;

      //code used to upload foodimage into the database and 
      //save the food image into the foodimage folder of 
      //our application
      // NB:remember to create the foodimage folder in the public folder of
      // our application

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
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
      $data = food::find($id);
      
      //the code that we used to upload the food image into the database 
      //and into the foodimage folder of our application that is 
      //in the upload function
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

      $data = reservation::all();
      return view ('admin.adminreservation', compact('data'));

    }
}
