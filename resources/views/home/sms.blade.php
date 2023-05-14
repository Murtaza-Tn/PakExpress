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

    <div class="container">
        <h1>Verify Your Number And Save</h1>

        <div class="alert alert-danger" id="error" style="display: none;"></div>

        <div class="card">
            <div class="card-header">
                Enter Phone Number
            </div>
            <div class="card-body">

                <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>

                <form>
                    <label>Phone Number:</label>
                    <input type="text" id="number" class="form-control" value="{{ $phone }}"
                        placeholder="+91********">
                    <div id="recaptcha-container"></div>
                    <button type="button" class="btn btn-success" style="color: black"
                        onclick="phoneSendAuth();">SendCode</button>
                </form>
            </div>
        </div>

        <div class="card" style="margin-top: 10px">
            <div class="card-header">
                Enter Verification code
            </div>
            <div class="card-body">

                <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>

                <form>
                    <input type="text" id="verificationCode" class="form-control"
                        placeholder="Enter verification code">
                    <button type="button" class="btn btn-success" style="color: black" onclick="codeverify();">Verify
                        code</button>

                </form>
            </div>
        </div>
        <div style="padding: 30px;">
            <form action="{{ url('Verify_num_save', $userid) }}">
                @csrf
                <label for="">Your Verify Number Save It</label>
                <input style="display: none" type="text" name="phone" id="NumResult">
                <div style="border: 1px solid #000;">

                    <p id="numR"></p>

                </div>
                <input style="color: black" type="submit" class="btn btn-success" value="Save">
            </form>
        </div>

    </div>


    @include('home.footer')

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
