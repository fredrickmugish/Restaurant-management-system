<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

use App\Models\Chef;

class HomeController extends Controller
{
    
 public function index()
 {


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
      return view('home', compact('data', 'data2'));
   }
 }

 public function viewchef()
 {
     $data = chef::all();
     return view('home', compact('data'));
 }

}
