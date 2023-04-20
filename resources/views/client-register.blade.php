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

    .otpPromptLine {
        margin: 4px 0;
        color: #000;
    }

    .otpPromptLine .number {}
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
                        <label for="contact_number" class="form-label  formLabelTheme">Contact Number <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number"
                            maxlength="10" />
                        <span id="check_phone" style="color:red"></span>
                    </div>
                    
                    <div class="form-group formElement">
                        <label for="contact_name" class="form-label  formLabelTheme">Billing Client <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" />
                    </div>
                </div>
                <div class="formRow">
                <div class="form-group formElement">
                        <label for="company_name" class="form-label  formLabelTheme">Legal Entity Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" />
                    </div>
                    <div class="form-group formElement">
                        <label for="email" class="form-label  formLabelTheme">Email ID <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="formRow">
                    <div class="form-group formElement">
                        <label for="postal_code" class="form-label  formLabelTheme">PIN Code <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="postal_code" name="pin" maxlength="6">
                    </div>
                    <div class="form-group formElement">
                        <label for="city" class="form-label  formLabelTheme">City <span
                                class="text-danger">*</span></label>
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
                        <input type="text" class="form-control" id="gst" name="gst_no" maxlength="15">
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


                <!-- <br> -->
                <div class="form-group col-md-6">

                    <label for="exampleFormControlInput2" class="d-flex align-items-center" style="gap: 5px"
                        data-toggle="modal" data-target="#acceptanceModal">
                        <input type="checkbox" name="notification" onclick="()=> return false"
                            style="height: 1rem;width: 1rem; accent-color: var(--primaryColor); pointer-events: none" value="1">
                        General Term</label>


                    <!-- <label for="exampleFormControlInput2">NOC for Notifications<span
                            class="text-danger">*</span></label>
                    <div class="check-box d-flex">
                        <div class="checkbox radio">
                            <label class="check-label">Yes
                                <input type="radio" value='1' name="notification">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox radio">
                            <label class="check-label">No
                                <input type="radio" name="notification" value='0' checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div> -->
                </div>

                <div class="formRow justify-content-between">
                    <div class="form-group row align-items-center" style="min-height: 100px; flex: 1">

                        <p class="otpPromptLine" style="flex: 1">Verify your register mobile number</p>

                        <div id="enterOTPBox" class="row align-items-start" style="display: none; flex: 1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
                                <span id="otp-error" style="color:red;"></span>
                                <!-- <label class="form-label formLabelTheme">Resend OTP</label> -->
                            </div>
                        </div>


                        <!-- <div class="col-md-6"> {!! htmlFormSnippet() !!} </div> -->
                    </div>

                    <button type="button" id="sendOTPButton" class="btn btn-primary" disabled style="width: 100%;"
                        onclick="sendOtp()">
                        <span class="indicator-label">Send OTP</span>
                        <span class="indicator-progress" style="display: none;">
                            Sending...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>

                    <button type="submit" id="verifyOTPButton" class="btn btn-primary"
                        style="width: 100%; background: #208120; border-color: #208120; display: none">
                        <span class="indicator-label">Verify</span>
                        <span class="indicator-progress" style="display: none;">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <p class="text-center">Already registered? <a href="{{url('/login')}}">Login</a> </p>

            </form>
        </div>
    </section>
    <!-- <span onclick="sss()">aaa</span> -->


    <!-- thank you modal -->
    <div class="modal fade" id="thankyou_model" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="thankyou_modelLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('assets/thankYou.png') }}" alt="thank you"
                        style="width: 100%; border-radius: 12px" />
                    <p class="text-center mx-auto mt-2 mb-5" style="max-width: 30ch">Please check your registered email
                        for your login credentials.</p>
                    <a href="{{url('/login')}}" class="btn btn-primary"
                        style="width: 100%; background: #208120; border-color: #208120;">Login</a>
                </div>
            </div>
        </div>
    </div>


    <!-- modal for noc acceptance -->
    <div class="modal fade" id="acceptanceModal" tabindex="-1" role="dialog" aria-labelledby="acceptanceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptanceModalLabel">NOC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Dear Customer,<br />
                        We would like to remind you that the notifications you receive after registering on our site are
                        for informational purposes only. While we strive to provide accurate and timely information, we
                        cannot guarantee the completeness or reliability of the information provided in these
                        notifications.<br />
                        We will not be liable for any loss or damage that may result from your reliance on the
                        information provided in these notifications. We advise that you verify any information received
                        through our service before taking any action or making any decisions based on that information.
                        Please note that notifications received through our site registration are intended solely for
                        the recipient and should not be shared with any third party without our prior written consent.
                        If you have received a notification in error, please notify us immediately and delete the
                        notification from your device.<br />
                        We reserve the right to modify or discontinue our notification service at any time without prior
                        notice. We will not be liable for any damages or losses resulting from the modification or
                        discontinuation of our notification service.<br />
                        Thank you for registering on our site, and we look forward to providing you with reliable and
                        timely information.<br /><br />
                        Best regards,<br />
                        AgriWings<br />
                        D2F Services Private Limited
                    </p>
                </div>
                <div class="modal-footer justify-content-around" style="border-top: 0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 100%; max-width: 300px; background: #9f123c; border-color: #9f123c;" onclick="onDeclineTerms()">Decline</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="width: 100%; max-width: 300px; background: #208120; border-color: #208120;" onclick="onAcceptTerms()   ">Accept</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="loginPageContainer container">
        <div class="droneImageBlock" style="flex: 1">
            <img src="{{asset('assets/drone.png')}}" alt="drone" />
        </div>
        <div class="loginBlock" style="flex: 1">
            <img src="{{asset('assets/agri-wing-logo.svg')}}" />


        </div>
    </div> -->

    <script>
    const sss = () => {
        $('#thankyou_model').modal('show')
    }


    const sendOtp = () => {
        $('#sendOTPButton').toggle();
        $('#enterOTPBox').toggle();
        $('#verifyOTPButton').toggle();
    }

    const onAcceptTerms = () => {
        $('input[name=notification]').prop('checked', true);
        $('#acceptanceModal').modal('hide');
        $('#sendOTPButton').removeAttr('disabled');
    }

    const onDeclineTerms = () => {
        $('input[name=notification]').prop('checked', false);
        $('#acceptanceModal').modal('hide');
        $('#sendOTPButton').attr('disabled', 'true');
    }
    </script>

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

    $("#contact_number").blur(function() {
        var number = $(this).val();
        if (!number) {
            return false;
        }
        $.ajax({
            url: "check-user-phone",
            type: "get",
            cache: false,
            data: {
                number: number
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                    "content"
                ),
            },
            success: function(data) {
                if (data.success == true) {
                    $("#check_phone").html(data.error_message);
                } else {
                    $("#check_phone").html('');
                }

            },
        });
    });

    $('#sendOTPButton').click(function() {

        var phone = $('#contact_number').val();
        if (!phone) {
            $('#check_phone').html('Please enter phone number');
            return false;
        }

        $.ajax({
            url: "sent-otp",
            type: "get",
            cache: false,
            data: {
                phone: phone
            },
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="_token"]').attr(
                    "content"
                ),
            },
            success: function(data) {
                if (data.success == true) {
                    swal('success', data.error_message, 'success')
                } else {
                    swal('error', data.error_message, 'error')
                }


            },
        });
    });
    </script>


</body>

</html>