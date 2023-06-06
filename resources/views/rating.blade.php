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

            <form class="rate py-3 mt-3" id="thankYou" style="display: none">
                <h6 class="mb-0">Thank you for your valueable feeback.</h6>
            </form>

            <form class="rate py-3 mt-3" id="feedback_form">
                <input type="hidden" name="order_id" value="{{$order_id}}" id="order_id">
                <h6 class="mb-0">Rate Service</h6>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>

                <div class="form-group mx-auto" style="width: 80%; max-width: 400px">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea placeholder="Feedback (if any)" class="form-control" name="feedback" id="feedback"
                        rows="3"></textarea>
                </div>
                <div class="buttons px-4 mt-0">
                    <button class="btn btn-block rating-submit" style="background: #208120"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="{{asset('newasset/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script>

$('.rating-submit').click(function(e) {
    e.preventDefault();

    var stars = $("input[name='rating']:checked").val();
    var feedback = $('#feedback').val();
    var order_id = $('#order_id').val();

    $.ajax({
        url: "/add-feedback/form",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {
            feedback: feedback,
            stars: stars,
            order_id: order_id
        },
        dataType: "json",
        beforeSend: function() {
           
        },
        success: (data) => {
            if (data.success == true) {
                $('#feedback_form').hide();
                $('#thankYou').show();
            } else {
            }

        }
    });
});
</script>

</html>