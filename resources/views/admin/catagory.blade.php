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
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        body{
            background-color: black;
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
                        <button class="normal" type="submit">Logout</button>
                    </form>
            </div>
        </div>


        <div style="margin-top: 100px;" class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                <div class="alert alert-success" >
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Catagory</h2>

                    <form action="{{url('add_catagory')}}" method="POST">

                        @csrf

                        <input type="text" class="input_color" name="catagory" placeholder="Write catagory name">

                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <td>Catagory Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)


                    <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td>
                            <a style="background-color: #088178;
                            color: #fff;" onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>





    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
