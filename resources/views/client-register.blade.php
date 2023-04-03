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
        min-width: 650px;
        max-width: 870px;
        width: min(90%, 400px);
        padding: 3rem 1rem;
        border-radius: 20px;
        box-shadow: 0 0 17px -4px #83838380;
        background: #fff;
        text-align: center;
    }

    .loginBlock img {
        max-height: min(60px, 350px);
        margin-bottom: 1rem;
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

    .formRow {
        display: flex;
        flex-wrap: wrap;
        column-gap: 1rem;
    }

    .formElement {
        flex: 1 0 250px;
        text-align: left;
        min-height: 62px;
    }

    input[type="file"],
    input[type="file"]:hover {
        border: none;
    }

    input[type="file"]::file-selector-button {
        color: #248f27;
        border: 2px solid #248f27;
        padding: 1px 6px;
        border-radius: 6px;
        font-size: 12px;
        background-color: #2c932f29;
        transition: 1s;
    }

    input[type="file"]::file-selector-button:hover {
        background-color: #81ecec;
        border: 2px solid #00cec9;
    }

    .captcha img {
        width: 200px;
    }

    a {
        color: #248f27
    }

    .captcha_error {
        color: red;
    }

    label.error {
        font-size: 12px;
        line-height: 12px;
    }

    .form-control.error {
        margin-bottom: -6px;
    }
    </style>
</head>

<body>

    <div class="loginPageContainer container">
        <div class="droneImageBlock" style="flex: 1">
            <img src="{{asset('assets/drone.png')}}" alt="drone" />
        </div>
        <div class="loginBlock" style="flex: 1">
            <img src="{{asset('assets/agri-wing-logo.svg')}}" />

            <form class="general_form" method="POST" action="{{url('/client-register')}}" id="client_register">
                @csrf
                <div class="formRow">
                    <div class="form-group formElement">
                        <input type="text" class="form-control" id="" name="company_name" placeholder="Company Name">
                    </div>
                    <div class="form-group formElement">
                        <input type="text" class="form-control" id="" name="contact_name" placeholder="Contact Person">
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement">
                        <input type="text" class="form-control"  name="contact_number"
                            placeholder="Contact Number">
                    </div>
                    <div class="form-group formElement">
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="yourEmail@address.com" value="">
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement" style="margin-bottom: 16px">
                        <input type="text" class="form-control" id="" name="gst_no" placeholder="GST No">
                        <input type="file" class="form-control" id="" name="gst_upload">
                    </div>
                    <div class="form-group formElement" style="margin-bottom: 16px">
                        <input type="text" class="form-control" id="" name="pan" placeholder="PAN">
                        <input type="file" class="form-control" id="" name="pan_upload">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="formElement">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        <!-- <span class="captcha_error"></span> -->
                    </div>


                    <div class="formElement captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                </div>
                <!-- <button class="btn btn-primary" style="width: 100%; background: #208120; border-color: #208120"
                    type="submit">Register</button> -->
                    <button type="submit" class="btn btn-primary" style="width: 100%; background: #208120; border-color: #208120"><span class="indicator-label">Register</span>
                 <span class="indicator-progress" style="display: none;">Please wait...
            	    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button> 
                <p>Already registered? <a href="{{url('/login')}}">Login</a> </p>
            </form>
        </div>
    </div>


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
    <script>
    // $("#client_register").submit(function(e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     var email = $('#email').val();
    //     if(!email){
    //         swal("error", 'Please Enter Email', "error");
    //         return false;
    //     }

    //     $.ajax({
    //         url: "client-register",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         data: new FormData(this),
    //         processData: false,
    //         contentType: false,
    //         beforeSend: function() {
    //             $(".indicator-progress").show();
    //             $(".indicator-label").hide();
    //         },
    //         success: (data) => {
    //             $(".indicator-progress").hide();
    //             $(".indicator-label").show();
    //             if (data.success == true) {
    //                 swal("success!", data.success_message, "success");
    //             } else if(data.validation == false){
    //                 $('.captcha_error').html(data.errors.captcha[0]);
    //             } else{
    //                 swal("error", data.error_message, "error");
    //             }
    //         },
    //     });
    // });

    $('#reload').click(function() {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>


</body>

</html>