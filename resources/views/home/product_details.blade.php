 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('sweetalert::alert')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="home/fonts/icomoon/style.css">

    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/css/magnific-popup.css">
    <link rel="stylesheet" href="home/css/jquery-ui.css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="home/css/aos.css">

    <link rel="stylesheet" href="home/css/style.css">
    @vite('resources/css/app.css')
    <style type="text/css">
      .AddToCart{
        padding:10px;
        background-color:pink;
        border: 1px solid pink;
        text:white;
      }

      .space{
        padding: 0.75rem 0;
      }

      .product {
        display: grid;
        grid-template-columns: 30% 30%;
        grid-gap: 2rem;
        margin-left: 20%;
        margin-top: 10%;

      }

      .sizes {
        text-decoration: uppercase;
        white-space: no-wrap;
      }

      #main {
  width: fit-content;
  height: auto;
  /* border: 1px solid #c3c3c3; */
  display: flex;
  flex-direction: row-reverse;
  gap: 0.5rem;
  margin-bottom:5px;
}

#main div {
  width: 50px;
  height: 50px;
  border: 1px solid white;
  padding-top: 14px;
  padding-left: 20px;
  border:1px solid gray;
}
    </style>
    
  </head>
  <body>
  
  <div class="site-wrap">

  @include('home.header')


  <div class='product'>
    <div class="">
      <a href="#" class="product-item md-height bg-gray d-block">
                <img src="product/{{$product->image}}" alt="Image" class="object-fill">
              </a>
    </div>

    <div class="">
    <h2 class="item-title" class="space"><a href="#">{{$product->title}}</a></h2>


@if($product->discount_price!=null)


<h4 class="space">
price<br>
<strong class="item-price" class="space">${{$product->discount_price}}.00</strong>
<strong style="text-decoration: line-through;" class="item-price" class="space">${{$product->price}}.00</strong>
</h4>

@else

<h4>
    price <br>
<strong class="item-price" class="space">${{$product->price}}.00</strong>
</h4>

@endif  

<h3 class="space">Category: {{$product->category}}</h3>
<h3 class="space">Description: {{$product->description}}</h3>
<h3 class="space">Available: {{$product->quantity}}</h3>

<div id="main">
  <div style="background-color:pink;">L</div>
  <div style="background-color:white;">M</div>
  <div style="background-color:white;">S</div>
</div>






<div>
<form action="{{url('add_cart', $product->id)}}" method="Post">

    @csrf
    <div>
    <input type="number" name="quantity" value="1" min="1">
    <input type="submit" class='AddToCart' value="Add to Cart">
    </div>
</form> 


</div>
</div>

    </div>
      
  </div>

<!-- 



  <div class="col-lg-4 col-md-6 item-entry mb-4" style="margin: auto; width:50%; padding:30px;">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="product/{{$product->image}}" alt="Image" class="object-fill">
            </a>
            <h2 class="item-title" class="space"><a href="#">{{$product->title}}</a></h2>


            @if($product->discount_price!=null)

           
            <h4 class="space">
            price<br>
            <strong class="item-price" class="space">${{$product->discount_price}}.00</strong>
            <strong style="text-decoration: line-through;" class="item-price" class="space">${{$product->price}}.00</strong>
            </h4>

            @else

            <h4>
                price <br>
            <strong class="item-price" class="space">${{$product->price}}.00</strong>
            </h4>

            @endif

            <h3 class="space">Category: {{$product->category}}</h3>
            <h3 class="space">Description: {{$product->description}}</h3>
            <h3 class="space">Available: {{$product->quantity}}</h3>

            
            



            
            <div>
            <form action="{{url('add_cart', $product->id)}}" method="Post">

                @csrf
                <div>
                <input type="number" name="quantity" value="1" min="1">
                <input type="submit" class='AddToCart' value="Add to Cart">
                </div>
            </form> 

         
            </div>
          </div>
       
        </div>
    


    




 

   





    @include('home.footer')


  </div> -->

  <script src="home/js/jquery-3.3.1.min.js"></script>
  <script src="home/js/jquery-ui.js"></script>
  <script src="home/js/popper.min.js"></script>
  <script src="home/js/bootstrap.min.js"></script>
  <script src="home/js/owl.carousel.min.js"></script>
  <script src="home/js/jquery.magnific-popup.min.js"></script>
  <script src="home/js/aos.js"></script>

  <script src="home/js/main.js"></script>
    
  </body>
</html>
