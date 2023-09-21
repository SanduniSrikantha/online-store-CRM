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
            



            
            <div>
              <button><a href="{{url('product_details', $product->id)}}">View Product</a></button>

              <form action="{{url('add_cart')}}" mrthod="Post">
                <input type="number" name="quantity" value="1" min="1">
                <input type="submit" value="Add to Cart">
              </form>
            </div>
          </div>
        @endforeach
        </div>


        
      </div>
    </div>