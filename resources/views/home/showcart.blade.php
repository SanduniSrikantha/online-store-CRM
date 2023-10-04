 

<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title></title>
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

    <style type="text/css">
        .center{
            margin:auto;
            width:70%;
            padding: 30px;
        }

        table, th, td {
            
        }

        .th_deg{
            font-size:20px;
            
            
            
        }

        .img_deg{
            height:200px;
            width: auto;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>

@if(session()->has('message'))

<div class="alert alert-success">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
{{session()->get('message')}}
</div>

@endif
    
  </head>
  <body>

  @include('sweetalert::alert')
  
  <div class="site-wrap">


  @include('home.header')



    


   
  <!--WORKING HERE RN---------------------------------------------------------------------------->  
  <h1 class="font-semibold text-2xl text-black ml-5 mb-3 mt-5">Shopping Cart</h1>
   <div class="center">
    <table>
        <tr>
            <th class="th_deg pl-5 uppercase pb-5">Image</th>
            <th class="th_deg pl-5 uppercase pb-5">Product title</th>
            <th class="th_deg pl-5 uppercase pb-5">Quantity</th>
            <th class="th_deg pl-5 uppercase pb-5">Price</th>
            
            <th class="th_deg pl-5 uppercase pb-5">Action</th>
        </tr>

        <?php $totalprice=0; ?>

        @foreach($cart as $cart)

        <tr>
            <td><img class='img_deg' src="/product/{{$cart->image}}"></td>
            <td class="pl-5">{{$cart->product_title}}</td>
            <td class="pl-5">{{$cart->quantity}}</td>
            
            <td class="pl-4">${{$cart->price}}.00</td>
    
            <td><a class="btn btn-danger ml-2 mr-2" onclick="confirmation(event)" href="{{url('/remove_cart', $cart->id)}}">Remove Product</a></td>
        </tr>

        <?php $totalprice=$totalprice + $cart->price ?>

        @endforeach

        

    </table>

    <div>
        <h1 class="uppercase pt-5">Total Price: ${{$totalprice}}.00</h1>
    </div>

    <div>
        <h1 class="pt-2">Proceed to order</h1>
        <div class="pt-4">
        <a href="{{url('cash_order')}}" class="btn btn-danger mr-3">Cash On Delivery</a>
        <a href="{{url('stripe', $totalprice )}}" class="btn btn-danger">Pay using Card</a>

        </div>

    </div>
   </div>



   


  </div>

  <script>
    function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title:'Are you sure you want to remove this product?',
            text:'You will not be able to revert this action',
            icon:'warning',
            buttons:true,
            danferMode:true,
        })
        .then((willCancel)=>{
            if(willCancel){
                window.location.href = urlToRedirect;
            }
        });
    }
  </script>

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








