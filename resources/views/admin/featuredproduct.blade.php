<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="admin1/admin.css">
    <style type="text/css">
    body{
        background: black;
        color: white
    }
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h1_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
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









        <div class="div_center">
            <h1 class="h1_font">Add Featured Product</h1>
            <form action="{{url('add_featured_product')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="div_design">
                    <label>Product Title</label>
                    <input type="text" class="input_color" name="title" placeholder="Write a Title" required="">
                </div>


                <div class="div_design">
                    <label>Product Brand</label>
                    <input type="text" class="input_color" name="brand" placeholder="Write Product Brand" >
                </div>


                <div class="div_design">
                    <label>Product Description</label>
                    <input type="text" class="input_color" name="description" placeholder="Write a Description" required="">
                </div>
                <div class="div_design">
                    <label>Product Price</label>
                    <input type="number" class="input_color" name="price" placeholder="Write a Price" required="">
                </div>

                <div class="div_design">
                    <label>Discount Price </label>
                    <input type="number" class="input_color" name="dis_price" placeholder="Write a Product Discount Price">
                </div>
                <div class="div_design">
                    <label>Product Quantity</label>
                    <input type="number" min="0" class="input_color" name="quantity" placeholder="Write a Quantity" required="">
                </div>

                <div class="div_design">
                    <label>Product Catagory</label>
                    <select name="catagory" id="" class="input_color" required="">
                        <option value="" selected="">Add a Catagore Here</option>

                        @foreach ($catagory as $catagory)

                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="div_design">
                    <label>Product Main Image</label>
                    <input type="file" name="image1" id="" >
                </div>


                <div class="div_design">
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </div>
            </form>
            <a class="btn btn-success" href="{{url('show_featured_product')}}">Show Products</a>

        </div>







    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
