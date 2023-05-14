<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="/admin1/admin.css">
    <style type="text/css">
        .center
        {

            margin: auto;
            width: 80%;
            border: 2px solid white;
            margin-top: 40px;
            text-align: center;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .image_size
        {
            widows: 150px;
            height: 150px;
        }
        .color_th
        {
            background: skyblue;
        }
        .th_deg
        {
            padding: 30px;
        }
        .text-center
        {
            padding: 15px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            margin: 15px;


        }
        * {
        box-sizing: border-box;
        }

        .column {
        float: left;
        padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
        content: "";
        clear: both;
        display: table;
        }
        </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>

    @include('admin.slidebar')



    <section  id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <div class="search">
                    <i class="fas">&#xf002;</i>
                    <input type="text" placeholder="search">
                </div>
            </div>

            <div class="profile">
                <i class="far fa-bell"></i>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
            </div>
        </div>



        <h2 class="font_size">{{$product->title}}</h2>
        <table class="center">
            <thead>
            <tr class="color_th">
                <th class="th_deg">Product Brand</th>
                <th class="th_deg">Product Description</th>
                <th class="th_deg">Product Catagory</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Discount Price</th>
                <th class="th_deg">Back</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{$product->brand}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->catagory}}</td>
                <td>

                    {{$product->quantity}}
                </td>
                <td>
                    {{$product->discount_price}}
                </td>
                <td>
                    <a class="btn btn-info" href="{{url('show_featured_product')}}">Back</a>

                </td>

            </tr>

        </tbody>
        </table>

        <div>


            <div class="container mt-3">
                <div class="card" style="width:500px">
                  <img class="card-img-top" src="/product/{{$product->image1}}" alt="Card image" style="width:100%">
                  <div class="card-body">
                  </div>
                </div>
                <br>
                <div class="row">

                    <div class="column">
                      <img src="/product/{{$product->image1}}" alt="Forest" style="width:100px">
                    </div>
                    <div class="column">
                      <img src="/product/{{$product->image2}}" alt="Mountains" style="width:100px">
                    </div>
                    <div class="column">
                        <img src="/product/{{$product->image3}}" alt="Mountains" style="width:100px">
                      </div>
                      <div class="column">
                        <img src="/product/{{$product->image4}}" alt="Mountains" style="width:100px">
                      </div>
                      <div class="column">
                        <img src="/product/{{$product->image5}}" alt="Mountains" style="width:100px">
                      </div>
                  </div>

        </div>



    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
