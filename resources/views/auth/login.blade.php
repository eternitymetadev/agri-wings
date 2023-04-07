<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agri Wings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="{{asset('assets/css/jquery.toast.css')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />



    <style>
    :root {
        --primaryColor: #02381d;
        --primaryContrast: #fff;
        --secondaryColor: #248f27;
        --secondaryContrast: #fff;
    }

    body {
        height: 100vh;
        background-size: cover;
        background: url("/assets/bg-1.png") center;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-repeat: no-repeat;
    }

    .loginPageContainer {
        width: 80%;
        margin: auto;
        height: 100%;
        padding: 1rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }

    .droneImageBlock img {
        max-height: min(60vh, 350px);
        /* transform: scaleX(-1); */
    }

    .loginBlock {
        min-height: min(80vh, 500px);
        min-width: 250px;
        max-width: 360px;
        width: min(90%, 400px);
        padding: 3rem 1rem;
        border-radius: 20px;
        box-shadow: 0 0 17px -4px #83838380;
        background: #fff;
        text-align: center;
    }

    .loginBlock img {
        max-height: min(60px, 350px);
    }

    .form-control:focus {
        border-color: #208120;
        box-shadow: 0 0 0 0.25rem #20812025;
    }

    @media (max-width: 600px) {
        .loginPageContainer {
            width: 96%;
        }

        .droneImageBlock {
            display: none;
        }
    }


    .authSection {
        min-height: 100vh;
        background-image: linear-gradient(180deg, var(--secondaryContrast), #02381d50), url("assets/bg-1.png");
        background-size: cover;
        /*background-attachment: fixed;*/
        background-repeat: no-repeat;
        display: flex;
        flex-flow: column;
        align-items: center;
        justify-content: flex-start;
        position: relative;
        padding-bottom: 4rem;
    }

    label.form-label.formLabelTheme {
        margin-bottom: 0;
        font-size: 13px;
        margin-left: 8px;
        color: var(--primaryColor);
        font-weight: 400;
    }

    /*.formBlock .form-control{*/
    /*    border: none;*/
    /*    background-color: transparent;*/
    /*}*/
    .formBlock {
        background: #ffffff20;
        backdrop-filter: blur(2px);
        border-radius: 20px;
        padding: 2rem 1rem;
    }

    .authSection .registerLogo {
        max-width: 200px;
        align-self: flex-start;
        margin: 1rem;

    }
    a {
        color: var(--primaryColor);
        text-decoration: none;
    }
    </style>
</head>

<body>
    <section class="authSection">
        <img src="{{asset('assets/agri-wing-logo.svg')}}" alt="logo" class="registerLogo" />
        <div class="loginPageContainer container">
            <div class="droneImageBlock" style="flex: 1">
                <img src="{{asset('assets/drone.png')}}" alt="drone" />
            </div>
            <div class="formBlock" style="flex: 1; max-width: 350px">
                <form method="POST" action="{{ route('login') }}" id="loginform" autocomplete="off"
                    class="text-left mt-3 mx-auto" style="max-width: 80%; ">
                    @csrf
                    <p style="text-align: left" class="mb-4">Welcome to <strong>AgriWings!</strong><br />Enter your
                        credentials to continue.</p>


                    <div class="form-group formElement">
                        <label for="login_id" class="form-label  formLabelTheme">Username</label>
                        <input type="text" class="form-control" name="login_id" id="login_id" placeholder="@username">
                    </div>
                    <div class="form-group formElement">
                        <label for="pwd" class="form-label  formLabelTheme">Password</label>
                        <input class="form-control" type="password" name="password" id="pwd"
                        value="{{ old('password') }}" autocomplete="password" autofocus placeholder="********">                    </div>

                   
                    <button class="btn btn-primary jj"
                        style="margin-top: 2rem;width: 100%; background: #208120; border-color: #208120"
                        type="submit">Login</button>
                </form>
                <p class="text-center">Not registered? <a href="{{url('/register')}}">Register</a> </p>
            </div>
        </div>
    </section>




    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>

    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/customjquery.validate.min.js')}}"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/custom-validation.js')}}"></script>
    <!-- multi select -->
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>

    <!-- sweet alert -->
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>

    <script>
    var APP_URL = {
        !!json_encode(url('/')) !!
    };



    $(document).ready(function() {
        App.init();
    });

    $(document).on('click', '#togglePassword', function() {
        if ($(this).hasClass('hidePass')) {
            $(this).removeClass('bi-eye-slash, hidePass');
            $(this).addClass('bi-eye');
            $('#pwd').attr('type', 'text');
        } else {
            $(this).removeClass('bi-eye');
            $(this).addClass('bi-eye-slash, hidePass');
            $('#pwd').attr('type', 'password');
        }

    });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>

    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/jquery.toast.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

</html>