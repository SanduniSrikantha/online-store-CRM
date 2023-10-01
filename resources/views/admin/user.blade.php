<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">

.div_center{
    text-align:center;
    padding-top:40px;
}

.font_size{
    font-size:30px;
    padding-bottom:40px;
}

.text_color{
    color:black;
    padding-bottom:20px;
}

label{
    display: inline-block;
    width:200px;
}

.div_design{
    padding-bottom:15px;
}



</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
    <!-- container-scroller -->
    <div class="main-panel">
        <div class="content-wrapper bg-white">
        @if(session()->has('message'))

<div class="alert alert-success">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
{{session()->get('message')}}
</div>

@endif

        <div class="div_center">
            <h1 class="font_size text-black">Add User</h1>

            <form action="{{url('add_user')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="div_design">
            <label class="text-black">Username: </label>   
            <input class="text_color" type="text" name="Username" placeholder="Enter username" required="">
            </div>

            <div class="div_design">
            <label class="text-black">Email: </label>   
            <input class="text_color" type="email" name="Email" placeholder="Enter username" required="">
            </div>

            <div class="div_design">
            <label class="text-black">Password: </label>   
            <input class="text_color" type="password" name="Password" placeholder="Enter username" required="">
            </div>

            <div class="div_design">
            <label class="text-black">Usertype: </label>   
            <input class="text_color" type="number" name="Usertype" placeholder="Enter username" required="">
            </div>


            
           

            <div class="div_design">
            <label class="text-black">Address: </label>   
            <input class="text_color" type="text" name="Address" placeholder="Enter username" required="">
            </div>

            <div class="div_design">
            <label class="text-black">Contact number: </label>   
            <input class="text_color" type="number" name="Phone" placeholder="Enter username" required="">
            </div>

            <div class="div_design">
            <input type="submit" value="Add User" class="btn btn-dark" required="">

            </div>

        </form>



            

        </div>


         </div>
    </div>
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>