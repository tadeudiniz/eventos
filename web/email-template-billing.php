<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Invoice</title>
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
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .email-header {
            background-color: #2f3e47;
            padding: 28px;
            text-align: center;
        }

        .email-header img {
            height: 26px;
        }

        .email-body {
            padding: 30px 32px;
        }

        .email-body h2 {
            font-size: 21px;
            margin: 0 0 24px;
            text-align: center;
            font-weight: 500;
        }

        .invoice-info {
            margin-bottom: 20px;
            font-size: 15px;
            line-height: 1.5;
        }

        .invoice-info strong {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .invoice-table td {
            padding: 10px 5px;
            border-top: 1px solid #ddd;
        }

        .invoice-table tr:last-child td {
            border-top: 2px solid #000;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .email-footer {
            font-size: 13px;
            text-align: center;
            color: #888;
            padding: 20px;
            background-color: #f5f5f5;
            border-top: 1px solid #ddd;
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
                <h2>Thanks for using UBold</h2>
                <div class="invoice-info">
                    <strong>Coderthemes</strong>
                    <div>Invoice #98765</div>
                    <div>July 17, 2025</div>
                </div>
                <table class="invoice-table">
                    <tr>
                        <td>Regular Licence</td>
                        <td class="text-right">$ 12.00</td>
                    </tr>
                    <tr>
                        <td>6 months Support</td>
                        <td class="text-right">$ 7.20</td>
                    </tr>
                    <tr>
                        <td>6 months Extended Support</td>
                        <td class="text-right">$ 7.20</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td class="text-right">$ 26.40</td>
                    </tr>
                </table>

                <p class="text-center"><a href="#" style="color: #00bcd4; text-decoration: underline;">View in browser</a></p>
                <p class="text-center">Coderthemes Inc., 456 Example Ave, Demo City, DemoLand</p>
            </div>
            <div class="email-footer">
                Questions? Email <a href="mailto:support@example.com">support@example.com</a>
            </div>
        </div>
    </div>
</body>

</html>