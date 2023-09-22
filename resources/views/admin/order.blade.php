<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .title_deg{
            text-align:center;
            font-size:25px;
            font-weight:bold;
            padding-bottom: 50px;
        }

        .table_deg{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            
            text-align: center;
        }

        .th_deg{
            background-color:blue;
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

        <h1 class="title_deg">All Orders</h1>

        <table class="table_deg">
            <tr class="th_deg">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Delivered</th>
            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img src="/product/{{$order->image}}">
                </td>
                <td>

                @if($order->delivery_status=='processing')
                    <a class="btn btn-primary" href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure this product has been delivered?')">Delivered</a>

                @else
                <p>Delivered</p>

                @endif
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
