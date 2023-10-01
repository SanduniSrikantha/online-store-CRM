<head> @vite('resources/css/app.css')</head>
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section mb-5 col-12">
            <h2 class="text-uppercase">Our Products</h2>
          </div>
        </div>

        <div class="row">
        @foreach($product as $product)

          <div class="col-lg-4 col-md-6 item-entry mb-4">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="product/{{$product->image}}" alt="Image" class="pb-5">
            </a>
            <h2 class="item-title mb-2"><a href="{{url('product_details', $product->id)}}">{{$product->title}}</a></h2>

            @if($product->discount_price!=null)

          

          
            <h4 class="mb-3">           
            <strong style="text-decoration: line-through;" class="item-price">${{$product->price}}.00</strong>
            <strong class="item-price">${{$product->discount_price}}.00</strong>
            </h4>

            @else

            <h4 class="mb-3">
            <strong class="item-price">${{$product->price}}.00</strong>
            </h4>

            @endif 
            

            

              <form action="{{url('add_cart', $product->id)}}" method="Post">

              @csrf

              <div>
                <input class="w-20 mr-5" type="number" name="quantity" value="1" min="1">
                <input class="font-semibold hover:font-extrabold" type="submit" value="Add to Cart">
              </div>
              </form>

           
            
          </div>
        @endforeach
        </div>


        
      </div>
    </div>