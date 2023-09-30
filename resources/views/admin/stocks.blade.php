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




 <h2 class="font_size">All Products</h2>
 <table class="center">
     <tr class="th_header">
         <th class="th_design">Title</th>
         <th class="th_design">Description</th>
         <th class="th_design">Quantity</th>
         <th class="th_design">Category</th>
         <th class="th_design">Price</th>
         <th class="th_design">Discount</th>
         <th class="th_design">Image</th>
         <th class="th_design">Update</th>
         <!--<th class="th_design">Delete</th>-->
     </tr>

     @foreach($product as $product)

     <tr>
         <td>{{$product->title}}</td>
         <td>{{$product->description}}</td>
         <td>{{$product->quantity}}</td>
         <td>{{$product->category}}</td>
         <td>{{$product->price}}</td>
         <td>{{$product->discount_price}}</td>
         <td>
             <img class="image_size" src="/product/{{$product->image}}">
         </td>

         <td>
             <a  class="btn btn-success"href="#">Order</a>
         </td>
         <!--<td>
         <a onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger "href="{{url('delete_product',$product->id)}}">Delete</a>
         </td>-->
    </tr>

     @endforeach

 </table>

 <!-- Products with less than 5 items in stock -->
<h2>Products with Low Stock</h2>
<ul>
    @foreach ($productsLowStock as $product)
        <li>{{ $product->title }} ({{ $product->quantity }} items in stock)</li>
    @endforeach
</ul>

<!-- Products with zero items in stock -->
<h2>Products Out of Stock</h2>
<ul>
    @foreach ($productsZeroStock as $product)
        <li>{{ $product->title }} (Out of stock)</li>
    @endforeach
</ul>





        
        </div>
    </div>
    
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>