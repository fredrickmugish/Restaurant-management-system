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
     
<div style="position: relative; top:60px; right:-5px">
<table bgcolor="grey" border="1px">
    <tr>
        <th style="padding: 15px">Name</th>
        <th style="padding: 15px">Email</th>
        <th style="padding: 15px">Phone</th>
        <th style="padding: 15px">Number</th>
        <th style="padding: 15px">Date</th>
        <th style="padding: 15px">Time</th>
        <th style="padding: 15px">Message</th>
    </tr>

    @foreach ($data as $data)
    <tr align="center">
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>{{ $data->phone }}</td>
        <td>{{ $data->guest }}</td>
        <td>{{ $data->date }}</td>
        <td>{{ $data->time }}</td>
        <td>{{ $data->message }}</td>
      </tr>
    @endforeach
      
</table>


</div>

  </div>
      @include("admin.adminscript")
  </body>
</html>