<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Confirm Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .email-wrapper {
            width: 100%;
            padding: 40px 0;
            background-color: #f4f6f9;
        }

        .email-content {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .email-header {
            background-color: #6658dd;
            padding: 24px;
            text-align: center;
        }

        .email-header img {
            height: 28px;
        }

        .email-body {
            padding: 30px;
        }

        .email-body h2 {
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 16px;
            color: #222;
        }

        .email-body p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #6658dd;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #5848c2;
        }

        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 20px;
            background-color: #f0f0f0;
            border-top: 1px solid #e0e0e0;
        }

        .email-footer a {
            color: #888;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <a href="#"><img src="assets/images/logo.png" alt="UBold" /></a>
            </div>
            <div class="email-body">
                <h2>Confirm Your Email</h2>
                <p>Please confirm your email address by clicking the button below.</p>
                <p>We may need to send you critical updates, so it’s important that we have an accurate email address.</p>
                <p style="text-align: center;">
                    <a href="#" class="btn">Confirm Email Address</a>
                </p>
                <p>— <b>UBold</b> Admin Dashboard Team</p>
            </div>
            <div class="email-footer">
                If you did not request this, please ignore this email. <br />
                <a href="#">Unsubscribe</a>
            </div>
        </div>
    </div>
</body>

</html>