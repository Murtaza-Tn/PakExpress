<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="admin1/admin.css">
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
        body{
            background: black;
            color: white;
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




        <h2 class="font_size">All Products</h2>
                <table class="center">
                    <thead>
                    <tr class="color_th">
                        <th class="th_deg">#</th>
                        <th class="th_deg">Product title</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">View Details</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $i = 0;
                    @endphp


                    @forelse ($product as $product)




                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$product->title}}</td>
                        <td>${{$product->price}}</td>



                        <td>
                            <a class="btn btn-info" href="{{url('detials', $product->id)}}">View</a>
                        </td>

                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_productss',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td colspan="5" class="text-center">No Product Yet!</td>
                    </tr>
                    @endforelse

                </tbody>
                </table>






    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
