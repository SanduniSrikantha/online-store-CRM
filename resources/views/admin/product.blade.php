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
    <div class="main-panel bg-white">
        <div class="content-wrapper bg-white">
            <div class="div_center">
            @if(session()->has('message'))

                    <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                    </div>

            @endif

            



                <h1 class="font_size uppercase text-black">Add Product</h1>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

                @csrf



                <div class="div_design">
                    <label class="text-black">Product Name</label>
                    <input class="text-black" type="text" name="title" placeholder="Enter product name" required="">
                </div>

                <div class="div_design">
                    <label class="text-black">Product Description</label>
                    <input class="text-black" type="text" name="description" placeholder="Enter product description" required="">
                </div>

                <div class="div_design">
                    <label class="text-black">Product Price</label>
                    <input class="text-black" type="number" name="price" placeholder="Enter product price" required="">
                </div>

                <div class="div_design">
                    <label class="text-black">Discounted Price</label>
                    <input class="text-black" type="number" name="dis_price" placeholder="Enter discounted price">
                </div>

                <div class="div_design">
                    <label class="text-black">Product Quantity</label>
                    <input class="text-black" type="number" min="0" name="quantity" placeholder="Enter product quantity" required="">
                </div>



                <div class="div_design">
                    <label class="text-black">Product Category</label>
                    <select class="text-black" name="category" placeholder="Enter quantity" required="">
                        
                        <option value="" selected="">Choose a category</option>

                        @foreach($category as $category)

                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                        @endforeach


                        <option></option>
                    </select>
                </div>

                <div class="div_design">
                    <label class="text-black">Product Image</label>
                    <input type="file" name="image" required="">
                </div>

                <div class="div_design">
                    
                    <input type="submit" value="Add Product" name="submit" class="btn btn-dark">
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