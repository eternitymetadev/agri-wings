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
    </style>
</head>

<body>

    <div class="loginPageContainer container">
        <div class="droneImageBlock" style="flex: 1">
            <img src="{{asset('assets/drone.png')}}" alt="drone" />
        </div>
        <div class="loginBlock" style="flex: 1">
            <form id="client_register">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Company Name</label>
                        <input type="text" class="form-control" id="" name="company_name" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact Person</label>
                        <input type="text" class="form-control" id="" name="contact_name" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Contact Number</label>
                        <input type="text" class="form-control" id="" name="contact_number" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Email ID</label>
                        <input type="text" class="form-control" id="" name="email" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">GST No</label>
                        <input type="text" class="form-control" id="" name="gst_no" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">PAN</label>
                        <input type="text" class="form-control" id="" name="pan" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">GST Upload</label>
                        <input type="file" class="form-control" id="" name="gst_upload" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">PAN Upload</label>
                        <input type="file" class="form-control" id="" name="pan_upload"placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
                            <div class="col-md-6 captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="captcha" class="col-md-4 col-form-label text-md-right">Enter Captcha</label>
                            <div class="col-md-6">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            </div>
                        </div>
                <button type="submit" class="btn btn-primary">Register</button>
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
    var APP_URL = {!!json_encode(url('/')) !!};



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
    $("#client_register").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "client-register",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".indicator-progress").show();
            $(".indicator-label").hide();
        },
        success: (data) => {
            $(".indicator-progress").hide();
            $(".indicator-label").show();
            if (data.success == true) {
                swal("success!", data.success_message, "success");
            } else {
                swal("error", data.error_message, "error");
            }
        },
    });
});

$('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>


</body>

</html>