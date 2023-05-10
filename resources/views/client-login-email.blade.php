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
        Dear {{$name}}, <br /><br />
        We are delighted to have you as our customer at Agriwings, and we appreciate your trust in us. As a valued<br />
        customer, we would like to provide you with your login credentials for our website https://app.agriwings.in/ so that
        you<br />
        can start managing your account and accessing our drone spray services.<br /><br />

        Your login credentials are:<br /><br />

        Username: {{$login_id}}<br />
        Password: {{$password}}<br />
        <br />
        We recommend that you change your password immediately after logging in for the first time. Please make sure to<br />
        choose a strong password that is unique and secure.<br />
        Once you have logged in, you can access your account dashboard, view your invoices, make payments, and manage<br />
        your account details. If you have any questions or concerns regarding your account or our services, please feel<br />
        free to contact us by email at secure.services@agriwings.com or by phone at [Customer Support Phone Number].<br />
        Our support team will assist you.<br /><br />

        Thank you for choosing Agriwings. We look forward to providing you with the best services possible.<br /><br />

        Best regards,<br />
        Team Agriwings<br />
        D2F Services Private Limited<br />

    </p>
</body>

</html>