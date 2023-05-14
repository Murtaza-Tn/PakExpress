<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="admin1/admin.css">
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
        }
        body{
            color: white;
            background-color: black;
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
            <h1 class="h1_font" style="margin: 30px">Add Blog Data</h1>
            <form action="{{url('add_blog_update')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="div_design">
                    <label>Blog Link</label>
                    <input type="text" class="input_color" name="blog_title" placeholder="Blog Link" required="">
                </div>


                <div class="div_design">
                    <label>Blog Number</label>
                    <input type="text" class="input_color" name="blog_number" placeholder="Write Blog number" >
                </div>


                <div class="div_design">
                    <label>Blog Description</label>
                    <input type="text" class="input_color" name="blog_description" placeholder="Write a Description" required="">
                </div>

                <div class="div_design">
                    <label>Blog View Button Text</label>
                    <input type="text" class="input_color" name="blog_view_btn" placeholder="Write blog button name" >
                </div>


                <div class="div_design">
                    <label>Blog Video Link</label>
                    <input type="text" class="input_color" name="blog_image" placeholder="Write blog Video link" >
                </div>


                <div class="div_design">
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </div>
            </form>
            <a class="btn btn-success" href="{{url('show_blog')}}">Show Blog Data And Delete</a>

        </div>




    </section>










    <script src="/admin1/adminscript.js"></script>
</body>
</html>
