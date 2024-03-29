<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    @include('admin.css')

    <style type="text/css">

        .div_center{
            text-align:center;
            color:black;

            padding-top:40px;
        }

        .font_size{
            font-size:30px;
            padding-bottom:40px;
        }

        .text_color{
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
            <div class="div_center">
            @if(session()->has('message'))

                    <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                    </div>

            @endif

            



                <h1 class="font_size text-black">Update Product</h1>

                <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf



                <div class="div_design">
                    <label>Product Name</label>
                    <input class="text_color" type="text" name="title" placeholder="Enter product name" required="" value="{{$product->title}}">
                </div>

                <div class="div_design">
                    <label>Product Description</label>
                    <input class="text_color" type="text" name="description" placeholder="Enter product description" required="" value="{{$product->description}}">
                </div>

                <div class="div_design">
                    <label>Product Price</label>
                    <input class="text_color" type="number" name="price" placeholder="Enter product price" required="" value="{{$product->price}}">
                </div>

                <div class="div_design">
                    <label>Discounted Price</label>
                    <input class="text_color" type="number" name="dis_price" placeholder="Enter discounted price" value="{{$product->discount_price}}">
                </div>

                <div class="div_design">
                    <label>Product Quantity</label>
                    <input class="text_color" type="number" min="0" name="quantity" placeholder="Enter product quantity" required="" value="{{$product->quantity}}">
                </div>



                <div class="div_design">
                    <label>Product Category</label>
                    <select class="text_color" name="category" placeholder="Enter quantity" required="">
                        
                        <option value="{{$product->category}}" selected="">{{$product->category}}</option>

                        <!--ADD-->

                        @foreach($category as $category)

                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach




                        <option></option>
                    </select>
                </div>

                <div class="div_design">
                    <label>Current Product Image</label>
                    <img style="margin:auto" height="100" width="100" src="/product/{{$product->image}}">
                </div>



                <div class="div_design">
                    <label>Change Product Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_design">
                    
                    <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
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