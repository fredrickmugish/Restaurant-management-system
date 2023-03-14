<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller"> 
      @include("admin.navbar")
     

  
      <div style="position: relative; top:60px; right:-100px">
        <form action="{{ url('/updatechef', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
    <div>
        <label>Chef Name</label>
        <input style="color:blue" type="text" name="name" value="{{ $data->name }}">
    </div>
    
    <div>
            <label>Speciality</label>
            <input  style="color:blue"type="text" name="speciality" value="{{ $data->speciality }}">
    </div>
    
    <div>
        <label>Old Image</label>
        <img type="file"  height="100" width="100" src="/chefimage/{{ $data->image }}">
    </div>

    <div>
        <label>New Image</label>
        <input type="file" name="image">
    </div>
    
    <div>
      <input style="background:green" type="submit" value="Update Chef">
    </div>
        </form>
    



  </div>
      @include("admin.adminscript")
  </body>
</html>