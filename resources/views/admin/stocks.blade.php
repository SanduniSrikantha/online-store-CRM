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
            font-size:30px;
            padding-top:20px;
        }

        .image_size{
            width:200px;
            height:auto;
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




 <h2 class="font_size text-black">Products Low on Stock</h2>
 <table class="center">
     <tr class="th_header">
         <th class="th_design text-black uppercase">Title</th>
         <th class="th_design text-black uppercase">Description</th>
         <th class="th_design text-black uppercase">Quantity</th>
         <th class="th_design text-black uppercase">Category</th>
         <th class="th_design text-black uppercase">Price</th>
         <th class="th_design text-black uppercase">Discount</th>
         <th class="th_design text-black uppercase">Image</th>
         <th class="th_design text-black uppercase">Update</th>
         <!--<th class="th_design">Delete</th>-->
     </tr>

     @foreach($productsLowStock as $product)

     <tr>
         <td class="text-black">{{$product->title}}</td>
         <td class="text-black">{{$product->description}}</td>
         <td class="text-black">{{$product->quantity}}</td>
         <td class="text-black">{{$product->category}}</td>
         <td class="text-black">{{$product->price}}</td>
         <td class="text-black">{{$product->discount_price}}</td>
         <td class="text-black">
             <img class="image_size" src="/product/{{$product->image}}">
         </td>

         <td class="text-black">
             <a  class="btn btn-success"href="#">Order</a>
         </td>
         <!--<td>
         <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger "href="{{url('delete_product',$product->id)}}">Delete</a>
         </td>-->
    </tr>

     @endforeach

 </table>


 <h2 class="font_size text-black">Products Out of Stock</h2>
 <table class="center">
     <tr class="th_header">
         <th class="th_design text-black uppercase">Title</th>
         <th class="th_design text-black uppercase">Description</th>
         <th class="th_design text-black uppercase">Quantity</th>
         <th class="th_design text-black uppercase">Category</th>
         <th class="th_design text-black uppercase">Price</th>
         <th class="th_design text-black uppercase">Discount</th>
         <th class="th_design text-black uppercase">Image</th>
         <th class="th_design text-black uppercase">Update</th>
         <!--<th class="th_design">Delete</th>-->
     </tr>

     @foreach($productsZeroStock as $product)

     <tr>
         <td class="text-black">{{$product->title}}</td>
         <td class="text-black">{{$product->description}}</td>
         <td class="text-black">{{$product->quantity}}</td>
         <td class="text-black">{{$product->category}}</td>
         <td class="text-black">{{$product->price}}</td>
         <td class="text-black">{{$product->discount_price}}</td>
         <td class="text-black">
             <img class="image_size" src="/product/{{$product->image}}">
         </td>

         <td class="text-black">
             <a  class="btn btn-success"href="#">Order</a>
         </td>
         <!--<td>
         <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger "href="{{url('delete_product',$product->id)}}">Delete</a>
         </td>-->
    </tr>

     @endforeach

 </table>







 </div>
 <!-- Products with less than 5 items in stock -->






        
        </div>
    </div>
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>