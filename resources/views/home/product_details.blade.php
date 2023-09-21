 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="home/fonts/icomoon/style.css">

    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/css/magnific-popup.css">
    <link rel="stylesheet" href="home/css/jquery-ui.css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="home/css/aos.css">

    <link rel="stylesheet" href="home/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

  @include('home.header')





  <div class="col-lg-4 col-md-6 item-entry mb-4" style="margin: auto; width:50%; padding:30px;">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="product/{{$product->image}}" alt="Image" class="img-fluid">
            </a>
            <h2 class="item-title"><a href="#">{{$product->title}}</a></h2>

            @if($product->discount_price!=null)

           
            <h4>
            price<br>
            <strong class="item-price">${{$product->discount_price}}.00</strong>
            <strong style="text-decoration: line-through;" class="item-price">${{$product->price}}.00</strong>
            </h4>

            @else

            <h4>
                price <br>
            <strong class="item-price">${{$product->price}}.00</strong>
            </h4>

            @endif

            <h3>Category: {{$product->category}}</h3>
            <h3>Description: {{$product->description}}</h3>
            <h3>Available: {{$product->quantity}}</h3>

            
            



            
            <div>
              
              <a href="" class="btn btn-primary">Add to Cart</a>
            </div>
          </div>
       
        </div>
    


    




 

   





    @include('home.footer')


  </div>

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
