<section id="header">
    <a href="{{url('/')}}"><img src="home/img/logo.png" class="logo" alt=""></a>

    <div>
      <ul id="navbar">
        <li><a class="active" href=" {{url('/')}} ">Home</a></li>
        <li><a href="{{url('shop')}}">Shop</a></li>
        <li><a href="{{url('blog')}}">Blog</a></li>
        <li><a href="{{url('about')}}">About</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
        <li><a href="{{url('orderdetials')}}">Order</a></li>

        @if (Route::has('login'))

        @auth
        <li>

            {{-- <x-app-layout>

            </x-app-layout> --}}


            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="normal" id="log-btn" type="submit">Logout</button>
            </form>

        </li>
        <li id="lg-bag">
            <div class="cart-icon">
              <a class="active" href="{{url('show_cart')}}"><i class="far fa-shopping-bag"></i></a>
              <span id="cart-count" class="cart-count">{{$total_cart}}</span>
            </div>
          </li>
        @else

        <li>

            <button class="normal" id="sign-btn"><a href="{{ route('login') }}" style="color: #fff">Sign In</a></button>
        </li>
        <li>
            <button class="normal" id="signup-btn"><a href="{{ route('register') }}" style="color: #fff">Sign Up</a></button>
        </li>
        <li id="lg-bag">
            <div class="cart-icon">
              <a class="active" href="{{url('show_cart')}}"><i class="far fa-shopping-bag"></i></a>
              <span id="cart-count" class="cart-count">0</span>
            </div>
          </li>
        @endauth
        @endif
          </ul>
    </div>

    <div id="mobile">
      <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>

  </section>
