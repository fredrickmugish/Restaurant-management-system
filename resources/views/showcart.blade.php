<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Restaurant</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                        <!--    <img src="#" align="klassy cafe html template">  -->
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section" style="background: red"><a href="#reservation">
                                
                                @auth
                                <a href="{{ url('/showcart', Auth::user()->id) }}">
                                Cart{{ $count }}
                                </a>
                                @endauth

                                @guest
                                    Cart[0]
                                @endguest
                               
                            </a>
                        </li> 

                            <li> 
                                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                    @auth
                                    <li>
                                        <x-app-layout>
                                        </x-app-layout>
                                        
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                    </li>
                                        @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        </li>
                                    
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            
                            </li>
                        </ul>        
                    
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>




<!--table to show cart items from the database-->
<div id="top">
<table align="center" bgcolor="green">
<tr>
    <th style="padding: 30px; color: white">Food name</th>
    <th style="padding: 30px; color:white">Price</th>
    <th style="padding: 30px; color:white">Quantity</th>
    <th style="padding: 30px;color: white ">Action</th>
</tr>



<form  action="{{ url('/insertorder') }}" method="post" enctype="multipart/form-data"> 
    @csrf
@foreach ($data as $data)
<tr align="center">
<td style="color: white"><input type="text" name="foodname[]" value="{{ $data->title }}"style="text-align: center" hidden="">
    {{ $data->title }}
</td>

<td style="color: white"> <input type="text" name="price[]" value="{{ $data->price }}" style="text-align: center" hidden="">
    {{ $data->price }}
</td>

<td style="color: white"><input type="text" name="quantity[]" value="{{ $data->quantity }}" style="text-align: center" hidden="">
    {{ $data->quantity }}
</td>
</tr>
@endforeach


@foreach ($data2 as $data2)

<tr style="position:relative;  top: -60px; right:-360px">

<td style="color: white"><a href="{{ url('/remove', $data2->id) }}"style="text-align: center" class="btn btn-warning">Remove</a></td>
</tr>

@endforeach
</table>

<div align="center" style="padding: 10px">
    
<button type="button" class="btn btn-primary" id="order">Order Now</button>

</div>


<div align="center" style="padding: 10px; display: none" id="appear">
        
        <div style="padding: 10px">
            <label>Name</label>
        <input type="text" name="name" placeholder="Enter name">
    </div>

    <div style="padding: 10px">
        <label>Phone</label>
    <input type="number" name="phone" placeholder="Enter phone number">
</div>

<div style="padding: 10px">
    <label>Address</label>
<input type="text" name="address" placeholder="Enter your email address">
</div>

<div style="padding: 10px">
    <button type="submit" class="btn btn-success" value="Order confirm">order confirm</button>
    <button type="button" id="close" class="btn btn-danger">close</button>
</div>
</div>
</form>





</div>

<script type="text/javascript">

  $("#order").click(

  function (){

    $("#appear").show();
     }

    );

    $("#close").click(

  function (){

    $("#appear").hide();
     }

    );

</script>






    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>