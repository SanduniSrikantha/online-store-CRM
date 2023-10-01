<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top:40px;
        }

        .h2_font{
            font-size:30px;
            padding-bottom:40px;
        }

        .input_color{
            color:black;
        }

        .center{
            margin:auto;
            width:50%;
            text-align:center;
            margin-top:30px;
            border:3px solid white;

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
                <h2 class="h2_font text-black">Add Category</h2>

                <form action="{{'/add_category'}}" method="POST">

                @csrf
                    <input class="input_color" type="text" name="category" placeholder="Write category name">
                    <input type="submit" class="btn btn-dark" name="submit" value="Add Category">
                </form>
            </div>

            <table class="center">
                <tr>
                    <td class="text-black uppercase pb-3">Category Name</td>
                    <td class="text-black uppercase pb-3">Action</td>
                </tr>

                @foreach($data as $data)



                <tr>
                    <td class="text-black pb-2">{{$data->category_name}}</td>
                    <td class="text-black"><a onclick="return confirm('Are you sure you want this category to be deleted?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
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
