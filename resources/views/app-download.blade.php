<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download App</title>

    <style>
    .main {
        min-height: 100vh;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
        align-content: center;
        gap: 1rem;
        text-align: center;
    }

    .main h1 {
        margin: 0 auto;
        font-size: clamp(2rem, 8vw, 3rem);
        line-height: clamp(2.1rem, 9vw, 3.2rem);
        font-weight: 500;
        color: #11345b;
        max-width: 16ch;
    }

    .main p {
        max-width: 50ch;
        margin: 1rem auto 3rem;
    }

    .main a {
        outline-offset: 0;
        outline: 2px solid #0d7d4500;
        cursor: pointer;
        transition: all 350ms ease-in-out;
        width: 160px;
        background: #0d7d45;
        color: #fff;
        padding: 1rem;
        border-radius: 50vh;
        text-decoration: none;
        font-size: 1.2rem;
    }

    .main a:hover {
        outline: 2px solid #0d7d45;
        outline-offset: 3px;
        border-radius: 20px;
        transition: all 350ms ease-in-out;
    }
    </style>

</head>

<body>
    <div class="main">
        <h1>Download the App<br />for ease of access</h1>
        <p>Boost your aerial spraying efficiency!
            Download our Drone Spray Services app now for seamless flight planning.
            Enhance your operations and stay informed.
            Fly high with us!</p>
        <a href="{{url('download')}}">
            Download App
        </a>
    </div>
</body>

</html>