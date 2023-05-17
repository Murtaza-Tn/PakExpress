<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="admin1/admin.css">
    <style type="text/css">
        .center {
            margin: auto;
            width: 100%;
            border: 2px solid white;
            margin-top: 20px;
            text-align: center;
        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .image_size {
            widows: 150px;
            height: 150px;
        }

        .color_th {
            background: skyblue;
        }

        .th_deg {
            padding: 15px;
        }

        .text-center {
            padding: 10px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            margin: 10px;


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
                        <button class="normal" type="submit">Logout</button>
                    </form>
            </div>
        </div>





        <div class="main-panel">
            <div style="background-color: #fff; color: black" class="content-wrapper">

                @if (session()->has('message'))
                <div style="background-color: #E7F6F2" class="alert alert-success" >
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true"></button>
                    {{session()->get('message')}}
                </div>

                @endif
                <h1
                    style="
                    text-align: center;
                    padding-bottom: 20px;
                    font-size: 55px;
                    line-height: 54px;
                    font-weight: 700;
                    margin-bottom: 10px;
                    ">
                    All Orders</h1>


                    <div style="text-align: center">
                        <form action="{{url('search')}}" method="GET">
                            @csrf
                            <input type="text" name="search" placeholder="search">

                            <input type="submit" value="search" class="btn btn-outline-primary">
                        </form>
                    </div>


                <table class="center">
                    <thead>
                        <tr class="color_th">
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Address</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Payment Status</th>
                            <th class="th_deg">Delivery Status</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Delivered</th>
                            <th class="th_deg">Print</th>
                            <th class="th_deg">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($product as $product)

                        <tr style="border: 2px solid rgb(28, 135, 162);">
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$product->product_title}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$product->email}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$product->phone}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                {{$product->address}}
                                <br>
                                {{$product->city}}</td>

                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$product->quantity}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                {{$product->price}}
                            </td>

                            @if ($product->pyment_status == "cash on delivery")

                            <td style="background-color: #F45050; padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                {{$product->pyment_status}}

                            </td>

                            @else
                            <td style="background-color: #03C988; padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                {{$product->pyment_status}}
                            </td>
                            @endif

                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">

                                {{$product->delivery_status}}
                            </td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                <img style="height: 100px;" src="product/{{$product->image1}}" alt="">
                            </td>

                            <td>
                                @if ($product->delivery_status == 'processing')

                                <a class="a-links btn btn-success" href="{{url('delivered', $product->id)}}">

                                    Delivered
                                </a>

                                @else
                                <p style="background-color: #03C988">Delivered</p>

                            @endif
                            </td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">

                                <a class="a-links btn btn-info" href="{{url('print_pdf', $product->id)}}">

                                    Print
                                </a>
                            </td>

                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                <a class="a-links" href="{{url('delete_order', $product->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            @empty
                            <div>
                                <td style=" text-align:center; padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                    No Data Found
                                </td>
                            </div>
                        @endforelse

                        </tr>

                    </tbody>
                </table>

            </div>

        </div>






    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
