<!DOCTYPE html>
<html lang="en">

<head>



    @include('home.head')
</head>

<body>
    @include('sweetalert::alert')



    @include('home.header')

    <section id="page-header" class="about-header">
        <h2>#Your Cart</h2>
        <p><strong><em>Your Order Details and status are shown here</em></strong></p>
    </section>


    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Title</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Status</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>

                @forelse ($order as $order)
                    <tr>
                        <td><img src="product/{{ $order->image1 }}" alt=""></td>
                        <td>{{ $order->product_title }}</td>
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td><strong>{{ $order->delivery_status }}</strong></td>
                        <td>
                            @if ($order->delivery_status == 'processing')
                                <button style="background-color: #088178;" class="normal" id="editBtn">
                                    <a style="color: #fff;" onclick="confirmation(event)"
                                        href="{{ url('order_cencel', $order->id) }}">
                                        Cancel
                                    </a>
                                </button>
                            @else
                                <strong style="color: green">
                                    Delivery Confirm
                                </strong>
                            @endif
                        </td>
                    @empty

                    @include('home.shopnowbutton')
                @endforelse

                </tr>
            </tbody>

        </table>
    </section>




    @include('home.footer')


    {{-- For PAge refresh --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <script src="script.js"></script>



{{-- Script for sweetAlret --}}
<script>
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you sure to cancel this product",
          text: "You will not be able to Confirm this!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {



              window.location.href = urlToRedirect;

          }


      });


  }
</script>

{{-- Sweet Alret --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>
