
<div class="site-navbar bg-white py-2">

<div class="search-wrap">
  <div class="container">
    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
    <form action="#" method="post">
      <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
    </form>  
  </div>
</div>

<div class="container">
  <div class="d-flex align-items-center justify-content-between">
    <div class="logo">
      <div class="site-logo">
        <a href="{{url('/')}}" class="js-logo-clone">MOMO</a>
      </div>
    </div>
    <div class="main-nav d-none d-lg-block">
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <ul class="site-menu js-clone-nav d-none d-lg-block">
          <li class="has-children active">
            <a href="{{url('/')}}">Home</a>
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
              <li class="has-children">
                <a href="#">Sub Menu</a>
                <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li><a href="shop.html">Shop</a></li>
          <li><a href="#">Catalogue</a></li>
          <li><a href="#">New Arrivals</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="icons">
      <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>


      @if (Route::has('login'))

      @auth

      


      <a href="{{url('show_cart')}}" class="icons-btn d-inline-block bag">
        <span class="icon-shopping-bag"></span>
        <span class="number">{{App\Models\cart::where('user_id','=',Auth::user()->id)->count()}}</span>
      </a>








      <li class="icons-btn d-inline-block">
          <!--<a class="btn btn-primary" id="logoutcss" href="{{ route('login') }}">Logout</a>-->
          <x-app-layout>

          </x-app-layout>
      </li>

      @else

      <li class="icons-btn d-inline-block">
          <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
      </li>

      <li class="icons-btn d-inline-block">
          <a class="btn btn-primary" id="regcss" href="{{ route('register') }}">Register</a>
      </li>

      @endauth

      @endif


      <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
    </div>
  </div>
</div>
</div>