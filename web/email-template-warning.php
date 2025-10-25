<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Warning Email</title>
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
            background-color: #38414a;
            padding: 24px;
            text-align: center;
        }

        .email-header img {
            height: 28px;
            margin-bottom: 10px;
        }

        .email-header span {
            display: block;
            color: #fff;
            font-size: 15px;
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
            background-color: #02c0ce;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #01acb9;
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
                <span>Warning: You're approaching your limit. Please upgrade.</span>
            </div>
            <div class="email-body">
                <p>You have <strong>1 free report</strong> remaining.</p>
                <p>Add your credit card now to upgrade your account to a premium plan to ensure you don't miss out on any reports.</p>
                <p style="text-align: center;">
                    <a href="#" class="btn">Upgrade My Account</a>
                </p>
                <p>Thanks for choosing <b>UBold</b> Admin.</p>
            </div>
            <div class="email-footer">
                <a href="#">Unsubscribe</a> from these alerts.
            </div>
        </div>
    </div>
</body>

</html>