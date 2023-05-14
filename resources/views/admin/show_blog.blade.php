<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PakExpress/Deshboard</title>
    <link rel="stylesheet" href="/admin1/admin.css">
    <style type="text/css">
        .center {
            margin: auto;
            width: 100%;
            border: 2px solid white;
            margin-top: 40px;
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
    </style> <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>

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





        <h1
        style="
        text-align: center;
        padding-bottom: 20px;
        font-size: 55px;
        line-height: 54px;
        font-weight: 700;
        margin-bottom: 10px;
        ">
        All Blogs</h1>




    <table class="center">
        <thead>
            <tr class="color_th">
                <th class="th_deg">Blog Video Link</th>
                <th class="th_deg">Bloag Title</th>
                <th class="th_deg">Blog Number</th>
                <th class="th_deg">Blog button name</th>
                <th class="th_deg">Blog Description</th>
                <th class="th_deg">Delete</th>
            </tr>
        </thead>
        <tbody>


            @forelse ($blog as $blog)


            <tr style="border: 2px solid rgb(28, 135, 162);">
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                {{$blog->blog_image}}
                </td>
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$blog->blog_title}}</td>
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$blog->blog_number}}</td>
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$blog->blog_view_btn}}</td>
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$blog->blog_description}}</td>
                <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                <a href="{{url('blog_delete', $blog->id)}}" class="btn btn-danger">Delete</a>
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



    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
