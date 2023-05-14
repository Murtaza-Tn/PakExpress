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
                    All Contact Message's</h1>




                <table class="center">
                    <thead>
                        <tr class="color_th">
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Subject</th>
                            <th class="th_deg">Message</th>
                            <th class="th_deg">Delete</th>
                        </tr>
                    </thead>
                    <tbody>



                        @forelse ($message as $message)



                        <tr style="border: 2px solid rgb(28, 135, 162);">
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$message->name}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$message->email}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$message->subject}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">{{$message->message}}</td>
                            <td style="padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                <a href="{{url('message_delete', $message->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                        @empty
                            <div>
                                <td style=" text-align:center; padding: 3px; border: 2px solid  rgb(28, 135, 162);">
                                    No Data Found
                                </td>
                            </div>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>






    </section>










    <script src="/admin1/adminscript.js"></script>

</body>
</html>
