<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
    body {

        background-color: #f7f6f6;
    }

    .card {
        width: 90%;
        border: none;
        box-shadow: 5px 6px 6px 2px #e9ecef;
        border-radius: 12px;
        max-width: 480px;
    }

    .circle-image img {
        border: 6px solid #fff;
        border-radius: 100%;
        padding: 0px;
        top: -28px;
        position: relative;
        width: 130px;
        height: 130px;
        border-radius: 100%;
        z-index: 1;
        background: #e7d184;
        cursor: pointer;

    }


    .dot {
        height: 18px;
        width: 18px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        border: 3px solid #fff;
        top: -48px;
        left: 186px;
        z-index: 1000;
    }

    .name {
        margin-top: -21px;
        font-size: 18px;
    }


    .fw-500 {
        font-weight: 500 !important;
    }


    .start {

        color: green;
    }

    .stop {
        color: red;
    }


    .rate {
        min-height: 240px;
        border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px;

    }



    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #208120;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }


    .buttons {
        top: 36px;
        position: relative;
    }


    .rating-submit {
        border-radius: 15px;
        color: #fff;
        height: 49px;
    }


    .rating-submit:hover {

        color: #fff;
    }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5" style="min-height: 95vh">
        <div class="card text-center mb-5" style="min-height: 300px; max-height: max-content; align-self: center">
            <div class="circle-image">
                <img src="https://app.agriwings.in/assets/farmer-icon.png" width="50">
            </div>

            <span class="name mb-1 fw-500">Order - {{$order_id}}</span>

            <div class="rate py-3 mt-3" id="thankYou" style="max-width: 350px; margin: auto; text-align: center">
                <h6 style="font-size: 1.5rem; margin-bottom: 10px">Feedback already submitted !!</h6>
                <p style="font-size: 0.9rem">You have already submitted your valueable feedback. <br/>We are happy to have words from you and we'll do our best to give you best.</p>
            </div>
        </div>
    </div>
</body>

</html>