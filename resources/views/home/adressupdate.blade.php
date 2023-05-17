<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adress/style.css">
</head>
<body>
    <div class="center">
      </div>
      <div class="popup">
        <div class="close-btn" id="clsBtn">
            <a href="{{url('show_cart')}}">
            <i style="font-size:24px" class="fa" >&#xf057;</i>
        </a>
        </div>
        <div class="form">
            <form action="{{url('address_update', $userid)}}" enctype="multipart/form-data">
                @csrf


            <h2>Update Address</h2>
          <div class="form-element">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter Name" value="{{$username}}">
          </div>
          <div class="form-element">
            <label>City</label>
            <input type="text" name="city" placeholder="Enter Your City Name" value="{{$usercity}}">
          </div>

          <div class="form-element">
            <label>Address</label>
            <input type="text" name="address" placeholder="Enter Address" value="{{$useraddress}}">
          </div>

          <div class="form-element">

            <button type="submit" id="myButton">Save</button>

          </div>

        </form>

      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      <script src="adress/script.js"></script>
</body>
</html>
