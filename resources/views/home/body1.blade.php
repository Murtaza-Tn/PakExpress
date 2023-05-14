<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">

        @foreach ($productfeatured as $productfeatured)

      <div class="pro">
        <a href="{{url('product_details', $productfeatured->id)}}"><img src="product/{{$productfeatured->image1}}" alt=""></a>
        <div class="des">
          <span>{{$productfeatured->brand}}</span>
          <h5>{{$productfeatured->title}}</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>

          @if ($productfeatured->discount_price)

          <h4>${{$productfeatured->discount_price}}</h4>

          <h4 style="text-decoration: line-through; color: #F15A59">${{$productfeatured->price}}</h4>

          @else

          <h4>${{$productfeatured->price}}</h4>

          @endif


        </div>
        <form action="{{url('add_cart', $productfeatured->id)}}" method="POST">
            @csrf

            <button><i class="fal fa-shopping-cart cart"></i></button>


            </form>
      </div>

      @endforeach
      </div>
      </div>
    </div>
  </section>
