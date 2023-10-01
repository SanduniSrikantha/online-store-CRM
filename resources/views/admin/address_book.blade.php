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
            background:;
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
        <div class="content-wrapper bg-white">

        @if(session()->has('message'))

<div class="alert alert-success">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
{{session()->get('message')}}
</div>

@endif




 <h2 class="font_size text-black">User Address Book</h2>
 <table class="center">
     <tr class="th_header">
         <th class="th_design text-black uppercase">Username</th>
         <th class="th_design text-black uppercase">Email</th>
         <th class="th_design text-black uppercase">Address</th>
         <th class="th_design text-black uppercase">Phone</th>

     </tr>

     @foreach($user as $user)

     <tr>
         <td class="text-black center pb-2">{{$user->name}}</td>
         <td class="text-black center pb-2">{{$user->email}}</td>
         <td class="text-black center pb-2">{{$user->address}}</td>
         <td class="text-black center pb-2">{{$user->phone}}</td>


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