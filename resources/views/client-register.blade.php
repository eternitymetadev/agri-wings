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
    {!! ReCaptcha::htmlScriptTagJsApi() !!}


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
    input[type="file"]:hover,
    input[type="file"]:focus {
        border: none;
        background: none;
        box-shadow: none;
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
        color: var(--primaryColor);
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
    </style>
</head>

<body>

    <section class="authSection">
        <img src="{{asset('assets/agri-wing-logo.svg')}}" alt="logo" class="registerLogo" />
        <div class="container formBlock" style="max-width: 1100px">
            <form class="general_form" method="POST" action="{{url('/client-register')}}" id="client_register">
                @csrf
                <div class="formRow">
                    <div class="form-group formElement">
                        <label for="company_name" class="form-label  formLabelTheme">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" />
                    </div>
                    <div class="form-group formElement">
                        <label for="contact_name" class="form-label  formLabelTheme">Contact Person</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" />
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement">
                        <label for="contact_number" class="form-label  formLabelTheme">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                            maxlength="10" />
                    </div>
                    <div class="form-group formElement">
                        <label for="email" class="form-label  formLabelTheme">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement">
                        <label for="postal_code" class="form-label  formLabelTheme">Pincode</label>
                        <input type="text" class="form-control" id="postal_code" name="pin" maxlength="6">
                    </div>
                    <div class="form-group formElement">
                        <label for="city" class="form-label  formLabelTheme">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="">
                    </div>
                    <div class="form-group formElement">
                        <label for="district" class="form-label  formLabelTheme">District</label>
                        <input type="text" class="form-control" id="district" name="district" readonly>
                    </div>
                    <div class="form-group formElement">
                        <label for="state" class="form-label  formLabelTheme">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="" readonly>
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement">
                        <label for="address" class="form-label  formLabelTheme">Address</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                        <!-- <input type="text" class="form-control" id="address" name="address"> -->
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement" style="margin-bottom: 16px">
                        <label for="gst" class="form-label  formLabelTheme">Gst No</label>
                        <input type="text" class="form-control" id="gst" name="gst_no">
                        <input type="file" class="form-control" id="" name="upload_gst">
                    </div>
                    <div class="form-group formElement" style="margin-bottom: 16px">
                        <label for="pan" class="form-label  formLabelTheme">Pan No</label>
                        <input type="text" class="form-control" id="pan" name="pan">
                        <input type="file" class="form-control" id="" name="upload_pan">
                    </div>
                </div>

               
                    <!-- <div class="formElement">
                        <label for="captcha" class="form-label  formLabelTheme">Cpatcha</label>
                        <input id="captcha" type="text" class="form-control" name="captcha">
                    </div> -->

                    <div class="form-group row">
                         
                            <div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
                        </div>
                    
                    <!-- <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>
                            <div class="col-md-6">
                                {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <br>

                <div class="formRow justify-content-between">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="notification" id="inlineCheckbox1"
                            value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Notification required, if yes then
                            disclaimer</label>
                    </div>
                        <button type="submit" class="btn btn-primary"
                            style="width: 100%; background: #208120; border-color: #208120"><span
                                class="indicator-label">Register</span>
                            <span class="indicator-progress" style="display: none;">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button>
                </div>
                <p class="text-center">Already registered? <a href="{{url('/login')}}">Login</a> </p>

            </form>
        </div>
    </section>

    <!-- <div class="loginPageContainer container">
        <div class="droneImageBlock" style="flex: 1">
            <img src="{{asset('assets/drone.png')}}" alt="drone" />
        </div>
        <div class="loginBlock" style="flex: 1">
            <img src="{{asset('assets/agri-wing-logo.svg')}}" />

          
        </div>
    </div> -->


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
    <!-- {!! NoCaptcha::renderJs() !!} -->
    <!-- {!! ReCaptcha::htmlScriptTagJsApi() !!} -->
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

    //
    $(document).on("keyup", "#postal_code", function() {
        var postcode = $(this).val();
        var postcode_len = postcode.length;
        if (postcode_len > 0) {
            $.ajax({
                url: "/get-address-by-postcode",
                type: "get",
                cache: false,
                data: {
                    postcode: postcode
                },
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                        "content"
                    ),
                },
                success: function(data) {
                    if (data.success) {
                        console.log(data.zone);

                        // $("#city").val(data.data.city);
                        $("#district").val(data.zone.district);
                        $("#state").val(data.zone.state);

                        if (data.zone == null || data.zone == "") {
                            $("#zone_name").val("No Zone Assigned");
                            $("#zone_id").val("0");
                        } else {
                            $("#zone_name").val(data.zone.primary_zone);
                            $("#zone_id").val(data.zone.id);
                        }
                    } else {
                        // $("#city").val("");
                        $("#district").val("");
                        $("#state").val("");
                        $("#zone_name").val("");
                        $("#zone_id").val("");
                    }
                },
            });
        } else {
            // $("#city").val("");
            $("#state").val("");
            $("#district").val("");
            $("#zone").val("");
        }
    });
    </script>


</body>

</html>