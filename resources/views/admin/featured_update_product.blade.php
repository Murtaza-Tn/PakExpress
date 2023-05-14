<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="/admin1/admin.css">
    <style type="text/css">
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
            padding-top: 20px;
        }
        .size_image
        {
            width: 100px;
            height: 100px;
            margin: auto;
        }
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            margin-top: 40px;
            text-align: center;
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
            <h1 class="h1_font">Add Product</h1>
            <form action="{{url('update_featured_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="div_design">
                    <label>Product Title</label>
                    <input type="text" class="input_color" name="title" placeholder="Write a Title" value="{{$product->title}}">
                </div>

                <div class="div_design">
                    <label>Product Brand</label>
                    <input type="text" class="input_color" name="brand" placeholder="Write Product Brand" value="{{$product->brand}}">
                </div>
                <div class="div_design">
                    <label>Product Description</label>
                    <input type="text" class="input_color" name="description" placeholder="Write a Description" value="{{$product->description}}">
                </div>
                <div class="div_design">
                    <label>Product Price</label>
                    <input type="number" class="input_color" name="price" placeholder="Write a Price" value="{{$product->price}}">
                </div>

                <div class="div_design">
                    <label>Discount Price </label>
                    <input type="number" class="input_color" name="dis_price" placeholder="Write a Product Discount Price" value="{{$product->discount_price}}">
                </div>
                <div class="div_design">
                    <label>Product Quantity</label>
                    <input type="number" min="0" class="input_color" name="quantity" placeholder="Write a Quantity" required="" value="{{$product->quantity}}">

                </div>

                <div class="div_design">
                    <label>Product Catagory</label>
                    <select name="catagory" class="input_color" required="">
                        <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>

                        @foreach ($catagory as $catagory)

                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="div_design">
                    <input type="submit" value="Update Datials" class="btn btn-primary">
                </div>


                <div class="center">

                    <div class="div_design" required="">
                        <label>Current Main Image</label>
                        <img class="size_image" src="/product/{{$product->image1}}" alt="">
                    </div>


                    <div class="div_design" required="">
                        <label>Change Main  Image</label>
                        <input type="file" name="image1">
                    </div>


                    <div class="div_design">
                        <input type="submit" value="Update Main Image" class="btn btn-primary">
                    </div>


                </div>


                <div class="center">


                    <div class="div_design" required="">
                        <label>Current Secound Image</label>
                        <img class="size_image" src="/product/{{$product->image2}}" alt="">
                    </div>


                    <div class="div_design" required="">
                        <label>Change secound  Image</label>
                        <input type="file" name="image2">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Update Secound Image" class="btn btn-primary">
                    </div>

                </div>


                <div class="center">

                    <div class="div_design" required="">
                        <label>Current Third Image</label>
                        <img class="size_image" src="/product/{{$product->image3}}" alt="">
                    </div>


                    <div class="div_design" required="">
                        <label>Change Third  Image</label>
                        <input type="file" name="image3">
                    </div>


                    <div class="div_design">
                        <input type="submit" value="Update Third Image" class="btn btn-primary">
                    </div>

                </div>




                <div class="center">


                    <div class="div_design" required="">
                        <label>Current Forth Image</label>
                        <img class="size_image" src="/product/{{$product->image4}}" alt="">
                    </div>


                    <div class="div_design" required="">
                        <label>Change Forth Image</label>
                        <input type="file" name="image4">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Update Forth Image" class="btn btn-primary">
                    </div>
                </div>




                <div class="center">

                    <div class="div_design" required="">
                        <label>Current Fifth Image</label>
                        <img class="size_image" src="/product/{{$product->image5}}" alt="">
                    </div>


                    <div class="div_design" required="">
                        <label>Change Fifth Image</label>
                        <input type="file" name="image5">
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Update Fifth Image" class="btn btn-primary">
                    </div>

                </div>


            </form>
        </div>



    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
