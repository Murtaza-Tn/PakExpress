<!DOCTYPE html>
<html lang="en">
<base href="/public">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PakExpress</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="home/style.css">
    </head>

    <body>

        @include('sweetalert::alert')


        @include('home.header')

        <section id="page-header">
          <h2>#stayhome</h2>
          <p>Save more with coupons & up to 70% off!</p>
        </section>


        <section id="product1" class="section-p1">


            <br><br>


            <div >
                <form action="{{url('product_search')}}" method="GET">
                    @csrf
                    <input style="width: 500px" type="text" name="search" placeholder="Search Product's">


                    <input style="color: black" class="btn btn-primary" type="submit" value="search">
                </form>
            </div>

            <h2>Featured Products</h2>
            <p>Summer Collection New Modern Design</p>
            <div class="pro-container">

                @foreach ($product as $products)

              <div class="pro">
                <a href="{{url('product_details_first', $products->id)}}"><img src="product/{{$products->image1}}" alt=""></a>
                <div class="des">
                  <span>{{$products->brand}}</span>
                  <h5>{{$products->title}}</h5>
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>

                  @if ($products->discount_price)

                  <h4>${{$products->discount_price}}</h4>

                  <h4 style="text-decoration: line-through; color: #F15A59">${{$products->price}}</h4>

                  @else

                  <h4>${{$products->price}}</h4>

                  @endif


                </div>
                <form action="{{url('add_cart', $products->id)}}" method="POST">
                    @csrf

                    <button><i class="fal fa-shopping-cart cart"></i></button>


                    </form>
              </div>

              @endforeach
              </div>
              </div>
            </div>
          </section>


          <span style="margin: 20px">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
        </span>
        <section id="newsletter" class="section-p1 section-m1">
          <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>spcial offers.</span></p>
          </div>
          <div class="form">
          <form action="{{url('email_newsletter')}}" method="GET">

            <input name="email" type="text" placeholder="Your email address">
            <button type="submit" class="normal">Sign Up</button>
        </form>
          </div>
        </section>


        @include('home.footer')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>

        <script src="home/script.js"></script>
    </body>

</html>
