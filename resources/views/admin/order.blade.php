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
            border: 0.5px solid white;
            width: 100%;
            margin:;
            
            text-align: center;
        }

        .th_deg{
            background-color:;
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

        <h1 class="title_deg text-black">All Orders</h1>

        <table class="table_deg">
            <tr class="th_deg">
                <th class="text-black uppercase pb-3 pl-3">Name</th>
                <th class="text-black uppercase pb-3 pl-3">Email</th>
                <th class="text-black uppercase pb-3 pl-3">Address</th>
                <th class="text-black uppercase pb-3 pl-3">Phone</th>
                <th class="text-black uppercase pb-3 pl-3">Product</th>
                <th class="text-black uppercase pb-3 pl-3">Quantity</th>
                <th class="text-black uppercase pb-3 pl-3">Price</th>
                <th class="text-black uppercase pb-3 pl-3">Payment Method</th>
                <th class="text-black uppercase pb-3 pl-3">Delivery Status</th>
                <!--<th class="text-black uppercase">Image</th> status-->
                <th class="text-black uppercase pb-3 pl-3">Edit status</th>
            </tr>

            @foreach($order as $order)
            <tr>
                <td class="text-black pb-1">{{$order->name}}</td>
                <td class="text-black pb-1">{{$order->email}}</td>
                <td class="text-black pb-1">{{$order->address}}</td>
                <td class="text-black pb-1">{{$order->phone}}</td>
                <td class="text-black pb-1">{{$order->product_title}}</td>
                <td class="text-black pb-1">{{$order->quantity}}</td>
                <td class="text-black pb-1">{{$order->price}}</td>
                <td class="text-black pb-1">{{$order->payment_status}}</td>
                <td class="text-black pb-1">{{$order->delivery_status}}</td>
                <!--<td class="text-black">
                    <img src="/product/{{$order->image}}">
                </td>-->
                <td>

                @if($order->delivery_status=='processing')
                    <a class="btn btn-primary" href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure this product has been delivered?')">Delivered</a>

                @else
                <p class="text-black">Delivered</p>

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
