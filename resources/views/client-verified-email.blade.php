<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
    p {
        margin-bottom: 0px !important;
        font-size: 0.9rem;
        line-height: 1.4rem;
    }

    .verify {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <p>
        Login ID:{{$login_id}} </br>
        Password : {{$password}} </br>
    </p>
    <a href="{{ url('/client-verification/'.$user_id) }}" target="_blank" class="btn btn-primary verify">verify
        Email</a>
</body>

</html>