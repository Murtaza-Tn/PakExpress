<!DOCTYPE html>
<html lang="en">

<base href="/public">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PakExpress</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


        <link rel="stylesheet" href="home/style.css">
    </head>

    <body>
        @include('sweetalert::alert')



        @include('home.header')


        @if (session()->has('message'))
        <div style="background-color: #E7F6F2;" class="alert alert-success" >
            <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true"></button>
            {{session()->get('message')}}
        </div>

        @endif

        <section id="prodetails" class="section-p1">
            <!-- Big Image -->
            <div class="single-pro-image">
                <img style="margin-bottom: 5px;" src="product/{{$productfeatured->image1}}" width="100%" id="MainImg" alt="">

                <!-- small images -->
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="product/{{$productfeatured->image1}}" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="product/{{$productfeatured->image2}}" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="product/{{$productfeatured->image3}}" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="product/{{$productfeatured->image4}}" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>
            <!-- Details -->
            <div class="single-pro-details">
                <h6 style="
                font-weight: 700;
                font-size: 16px;">
                Home / T-shirt</h6>
                <h4 style="
                font-size: 26px;
                font-weight: 900;
                color: #222;"
                >{{$productfeatured->title}}</h4>


               @if ($productfeatured->discount_price)


                <h2 style="
                font-size: 46px;
                line-height: 54px;
                color: #222;
                font-weight: 700;


                ">${{$productfeatured->discount_price}}</h2>


                <h2 style="
                font-size: 20px;
                line-height: 40px;
                font-weight: 700;

                text-decoration: line-through;
                color: #F15A59

                ">${{$productfeatured->price}}</h2>

                  @else

                  <h2 style="
                  font-size: 46px;
                  line-height: 54px;
                  color: #222;
                  font-weight: 700;


                  ">${{$productfeatured->price}}</h2>

          @endif






                <form action="{{url('add_cart', $productfeatured->id)}}" method="POST">
                    @csrf

                    <input type="number" name="quantity" value="1" min="1">

                    <button type="submit" class="normal">Add To Cart</button>

                    <button class="normal" style="color:#E7F6F2; background-color: #ED2B2A">
                        <a href="{{url('show_cart')}}">Buy Now</a>
                        </button>


                </form>
                <h4 style="
                font-size: 26px;
                font-weight: 900;
                color: #222;">Product Details</h4>
                <span>
                    {{$productfeatured->description}}
                </span>
            </div>
        </section>

        <section id="product1" class="section-p1">
            <h2 style="
            font-size: 55px;
            line-height: 60px;
            color: #222;
            font-weight: 700;

            ">Featured Products</h2>
            <div class="pro-container">

                @foreach ($product as $product)

                <div class="pro">
                  <a href="{{url('product_details', $product->id)}}"><img  src="product/{{$product->image1}}" alt=""></a>
                  <div class="des">
                    <span>{{$product->brand}}</span>
                    <h5>{{$product->title}}</h5>
                    <div class="star">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>

                    @if ($product->discount_price)

                    <h4>${{$product->discount_price}}</h4>

                    <h4 style="text-decoration: line-through; color: #F15A59">${{$product->price}}</h4>

                    @else

                    <h4>${{$product->price}}</h4>

                    @endif


                  </div>
                  <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>

                @endforeach

          </section>

        <section id="newsletter" class="section-p1 section-m1">
          <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>spcial offers.</span></p>
          </div>
          <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
          </div>
        </section>


        @include('home.footer')

        <script>
            var MainImg = document.getElementById("MainImg");
            var smallimg = document.getElementsByClassName('small-img');

            // swap source with large image when a small img is clicked
            smallimg[0].onclick = function() {
                MainImg.src = smallimg[0].src;
            }
            smallimg[1].onclick = function() {
                MainImg.src = smallimg[1].src;
            }
            smallimg[2].onclick = function() {
                MainImg.src = smallimg[2].src;
            }
            smallimg[3].onclick = function() {
                MainImg.src = smallimg[3].src;
            }
        </script>

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
