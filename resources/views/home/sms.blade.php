<html>

<head>

    <base href="/public">
    <title>PakExpress OTP</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="home/style.css">

</head>

<body>
    @include('home.header')

    <div class="container" style="width: 50%">
        <h1 style="margin-top: 20px; text-align: center; font-size: 30px; font-weight: 600;">Verify Your Number And Save</h1>

        <div class="alert alert-danger" id="error" style="display: none; width: 300px"></div>

        <div class="card">
            <div style="text-align: center; font-weight:600;" class="card-header">
                Enter Phone Number
            </div>
            <div class="card-body">

                <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>

                <form>
                    <label style="text-align: center; font-Weight: 600">Phone Number:</label>
                    <input type="text" id="number" style="width: 300px;" class="form-control" value="{{ $phone }}"
                        placeholder="+91********">
                    <div id="recaptcha-container"></div>
                    <button type="button" class="btn btn-success" style="color: #fff"
                        onclick="phoneSendAuth();">SendCode</button>
                </form>
            </div>
        </div>

        <div class="card" style="margin-top: 10px">
            <div style="text-align: center; font-weight:600;" class="card-header">
                Enter Verification code
            </div>
            <div class="card-body">

                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>

                <form>
                    <input style="width: 300px;" type="text" id="verificationCode" class="form-control"
                        placeholder="Enter verification code">
                    <button type="button" class="btn btn-success" style="color: #fff" onclick="codeverify();">Verify
                        code</button>

                </form>
            </div>
        </div>



        <div class="card" style="margin-top: 10px; margin-bottom: 30px">
            <div style="text-align: center; font-weight:600;" class="card-header">
                Verify Your Number Save It
            </div>
        <div class="card-body">
            <form action="{{ url('Verify_num_save', $userid) }}">
                @csrf
                <input style="display: none" type="text" name="phone" id="NumResult">
                <div style="border: 1px solid #000; width: 300px;" class="form-control">

                    <p style="" id="numR"></p>

                </div>
                <input style="color: #fff" type="submit" class="btn btn-success" value="Save">
            </form>
        </div>
    </div>

    </div>



    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyARDo6-6waGBkw8f_P8_BzTFwPtCJVwjOc",
            authDomain: "pakexpress-28171.firebaseapp.com",
            databaseURL: "https://pakexpress-28171-default-rtdb.firebaseio.com",
            projectId: "pakexpress-28171",
            storageBucket: "pakexpress-28171.appspot.com",
            messagingSenderId: "228647235102",
            appId: "1:228647235102:web:acae0da8cfd3bd288f080f",
            measurementId: "G-07PR1WL3LJ"
        };

        firebase.initializeApp(firebaseConfig);
    </script>

    <script type="text/javascript">
        window.onload = function() {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function phoneSendAuth() {

            var number = $("#number").val();

            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {

                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);

                $("#sentSuccess").text("Message Sent Successfully.");
                $("#sentSuccess").show();

            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });

        }

        function codeverify() {

            var code = $("#verificationCode").val();

            coderesult.confirm(code).then(function(result) {
                var user = result.user;
                var r = user.phoneNumber;
                console.log(user);

                console.log(r);

                $('#numR').text(r);
                $("#NumResult").val(r);
                $("#successRegsiter").text("you are register Successfully.");
                $("#successRegsiter").show();

            }).catch(function(error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
    </script>

</body>

</html>
