<section id="header">
    <a href="{{url('/')}}"><img src="home/img/logo.png" class="logo" alt=""></a>

    <div>
      <ul id="navbar">
        <li><a class="active" href=" {{url('/')}} ">Home</a></li>
        <li><a href="{{url('shop')}}">Product's</a></li>
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
                <button type="submit">Logout</button>
            </form>

        </li>
        @else

        <li>

            <a href="{{ route('login') }}">Login</a>
        </li>
        <li>
            <a href="{{ route('register') }}">Registration</a>
        </li>
        @endauth
        @endif
        <li id="lg-bag">
            <div class="cart-icon">
              <a class="active" href="{{url('show_cart')}}"><i class="far fa-shopping-bag"></i></a>
            </div>
          </li>
      </ul>
    </div>

    <div id="mobile">
      <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>

  </section>
