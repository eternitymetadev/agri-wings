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
        Dear {{$contact_name}}, <br /> <br />
        Thank you for signing up for an account with Agriwings. Before you can access your account, we need to
        verify<br />
        your email address.<br /><br />

        Please click on the following link to verify your email address: <a
            href="{{ url('/client-verification/'.Crypt::encrypt($user_id))}}" target="_blank"
            class="btn btn-primary verify">verify
            Email</a>
        <br /><br />
        Once you have clicked on the link, your email address will be verified, and you will be able to log in to your
        account.<br /><br />

        If you did not sign up for an account with Agriwings, please ignore this email.<br /><br />

        If you have any questions or concerns, please feel free to contact us by email at secure.services@agriwings.com
        or by phone at [Customer Support Phone Number].<br /><br />

        Our support team is available [Business hours and days] to assist you.<br /><br />

        Thank you for choosing Agriwings. We look forward to providing you with the best services possible.<br /><br />

        Best regards,<br />
        Team Agriwings<br />
        D2F Services Private Limited

    </p>

</body>

</html>