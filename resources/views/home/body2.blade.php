<section id="product1" class="section-p1">
    <h2 style="
    font-size: 55px;
    line-height: 60px;
    color: #222;
    font-weight: 700;

    ">New Arivals</h2>
    <div class="pro-container">


        @foreach ($product as $product)

        <div class="pro">
            <a href="{{url('product_details_first', $product->id)}}"><img src="product/{{$product->image1}}" alt=""></a>
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
            <form action="{{url('add_cart', $product->id)}}" method="POST">
                @csrf

                <button><i class="fal fa-shopping-cart cart"></i></button>


                </form>
          </div>

      @endforeach


    </div>
  </section>
