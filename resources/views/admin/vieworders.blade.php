<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller"> 
      @include("admin.navbar")
     


<div style="position:relative; top:60px; right:-30px">
    <h1 align="center">Orders table</h1>

<form action="{{ url('/search') }}" method="get">
  @csrf
  <input type="text" name="search" style="color: blue">
  <input type="submit" value="search" class="btn btn-success">
</form>

    <table bgcolor="black">
        <tr>
            <th style="padding: 30px">Food name</th>
            <th style="padding: 30px">Price</th>
            <th style="padding: 30px">Quantity</th>
            <th style="padding: 30px">Name</th>
            <th style="padding: 30px">Phone</th>
            <th style="padding: 30px">Total price</th>
            
        </tr>

        @foreach ($data as $data)
        <tr align="center">
            <td>{{ $data->foodname }}</td>
            <td>{{ $data->price }}$</td>
            <td>{{ $data->quantity }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->price * $data->quantity }}$</td>

        </tr>
        @endforeach
        
    </table>
</div>





  </div>
      @include("admin.adminscript")
  </body