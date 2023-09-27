<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .center{
            margin:auto;
            width:50%;
            border: 2px solid white;
            text-align:center;
            margin-top:40px;
        }

        .font_size{
            text-align:center;
            font-size:40px;
            padding-top:20px;
        }

        .image_size{
            width:150px;
            height:150px;
        }

        .th_header{
            background:purple;
        }

        .th_design{
            padding:20px;
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
        <div class="content-wrapper">

        @if(session()->has('message'))

<div class="alert alert-success">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
{{session()->get('message')}}
</div>

@endif




 <h2 class="font_size">All Users</h2>
 <table class="center">
     <tr class="th_header">
         <th class="th_design">Username</th>
         <th class="th_design">Email</th>
         <th class="th_design">Password</th>
         <th class="th_design">Address</th>
         <th class="th_design">Phone</th>
         <th class="th_design">Usertype</th>
         
         <th class="th_design">Update</th>
         <th class="th_design">Delete</th>
     </tr>

     @foreach($user as $user)

     <tr>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
         <td></td>
         <td>{{$user->address}}</td>
         <td>{{$user->phone}}</td>
         <td>{{$user->usertype}}</td>


         <td>
             <a  class="btn btn-success"href="">Update</a>
         </td>
         <td>
         <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger "href="">Delete</a>
         </td>
     </tr>

     @endforeach

    

 </table>






        </div>
    </div>
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>