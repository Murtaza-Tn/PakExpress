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

    <section id="page-header" class="about-header">
        <h2
            style="
          font-size: 55px;
          line-height: 54px;
          font-weight: 700;
          margin-bottom: 10px;
          ">
            #let's_talk
        </h2>
        <p style="
          font-size:20px;
          line-height: 20px;
          ">LEAVE A MESSAGE, WE LOVE TO HEAR
            FROM You!</p>
    </section>


    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalprice = 0;

                @endphp

                @forelse ($cart as $cart)
                    <tr>
                        {{-- script message is botom and controller --}}
                        <td><a onclick="confirmation(event)" href="{{ url('delete_product', $cart->id) }}"><i
                                    class="far fa-times-circle"></i></a>
                        </td>
                        <td><img src="product/{{ $cart->image1 }}" alt=""></td>
                        <td>{{ $cart->product_title }}</td>
                        <td>${{ $cart->first_price }}</td>


                        <td>
                            <td>{{-- value Plus --}}
                                <form action="{{url('incress_quantity', $cart->id)}}" method="get">
                                <input style="display: none"  name="quantity_new" value="{{$cart->quantity}}" min="1">
                                <input style="margin-left: 30px" type="submit" value="+">
                                </form></td>

                            <td>                        {{-- Value Minus --}}
                                <form action="{{url('dec_quantity', $cart->id)}}" method="get">
                                    <input style="width: 50px" type="number"  name="quantity_new" value="{{$cart->quantity}}" min="1">
                                    <input style="margin-right: 80px" type="submit" value="-">
                                </form></td>


                        </td>
                        <td>${{ $cart->price }}</td>
                    </tr>

                    <?php $totalprice = $totalprice + $cart->price;

                    ?>

                @empty
                    <section>
                        <div id="h-p">
                            <p>Click Here to see our other <strong><em>Products!</em></strong></p>
                        </div>
                        <div style="margin: 30px" id="h-shop">
                            <a href="{{ url('shop') }}">Shope</a>
                        </div>
                    </section>
                @endforelse

            </tbody>
        </table>
    </section>







    <section id="cart-add" class="section-p1">
        <div id="subtotal">
            <h3>Your Information</h3>
            <table>
                <tr>
                    <td>Full Name</td>
                    <td>{{ $username }}</td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td>{{ $userphone }}</td>
                </tr>
                <tr>
                    <td>city</td>
                    <td>{{ $usercity }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $useraddress }}</td>
                </tr>
            </table>
            <a href="{{ url('adressupdate', $id) }}">
                <button class="normal" id="editBtn">Edit Address</button>
            </a>
            <a href="{{ url('mobile_verification', $id) }}">
                <button class="normal" id="editBtn">Phone Number Verify</button>
            </a>
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>${{$totalprice}}</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                @php
                    $final_price = 0;

                @endphp
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>${{$totalprice}}</strong></td>
                </tr>
            </table>




            <a href="{{ url('cash_order', $totalprice) }}">
                <button style="margin-left: 80px" class="normal">Cash On Delivery</button>

            </a>
            <a href="{{ url('stripe', $totalprice) }}">
                <button style="margin-left: 50px; background-color: #F15A59" class="normal ">Pay Using Card</button>
            </a>




        </div>
    </section>





    @include('home.footer')





    {{-- PAge refresh bask to same screen --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="home/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>

</html>
