<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Food;

class HomeController extends Controller
{
    
 public function index()
 {


   //an instance that will be used to fetch data from the models food table
   $data = food::all();

    return view ('home', compact('data'));
 }


 public function redirects(){


   //an instance that will be used to fetch data from the models food table
   //remember undefined $data variable error
    $data = food::all();

   $usertype = Auth::user()->usertype;

   if($usertype=='1'){

      return view('admin.adminhome');
   }

   else 
   {
      return view('home', compact('data'));
   }
 }

}
