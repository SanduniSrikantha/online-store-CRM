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
            width:300px;
            height:auto;
        }

        .th_header{
            background:;
            margin-bottom:2px;
    
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
    <div class="main-panel bg-white">
        <div class="content-wrapper bg-white">
        @if(session()->has('message'))

           <div class="alert alert-success">

           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           {{session()->get('message')}}
           </div>

        @endif




            <h2 class="font_size text-black mb-5">All Products</h2>
            <table class="">
                <tr class="th_header">
                    <th class="th_design text-black uppercase text-md ">Title</th>
                    <th class="th_design text-black uppercase text-md">Description</th>
                    <th class="th_design text-black uppercase text-md">Quantity</th>
                    <th class="th_design text-black uppercase text-md">Category</th>
                    <th class="th_design text-black uppercase text-md">Price</th>
                    <th class="th_design text-black uppercase text-md">Discount</th>
                    <th class="th_design text-black uppercase text-md">Image</th>
                    <th class="th_design text-black uppercase text-md">Update</th>
                    <th class="th_design text-black uppercase text-md">Delete</th>
                </tr>

                @foreach($product as $product)

                <tr>
                    <td class="text-black center">{{$product->title}}</td>
                    <td class="text-black center">{{$product->description}}</td>
                    <td class="text-black center">{{$product->quantity}}</td>
                    <td class="text-black center">{{$product->category}}</td>
                    <td class="text-black center">{{$product->price}}</td>
                    <td class="text-black center">{{$product->discount_price}}</td>
                    <td class="text-black center">
                        <img class="image_size mt-3" src="/product/{{$product->image}}">
                    </td>

                    <td>
                        <a  class="btn btn-success ml-3"href="{{url('update_product',$product->id)}}">Update</a>
                    </td>
                    <td>
                    <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger "href="{{url('delete_product',$product->id)}}">Delete</a>
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
