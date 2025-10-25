<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>New Feature Announcement</title>
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
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .email-header {
            background-color: #2f55d4;
            padding: 24px;
            text-align: center;
        }

        .email-header img {
            height: 32px;
        }

        .email-header span {
            color: #fff;
            display: block;
            font-size: 16px;
            margin-top: 10px;
        }

        .email-body {
            padding: 30px;
        }

        .email-body h2 {
            font-size: 22px;
            margin-top: 0;
            margin-bottom: 20px;
            color: #2f55d4;
        }

        .email-body p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature {
            display: flex;
            align-items: flex-start;
        }

        .feature svg {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            margin-right: 12px;
            color: #2f55d4;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #2f55d4;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #1c3fb4;
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
                <span>Exciting New Features Just Launched!</span>
            </div>
            <div class="email-body">
                <h2>Introducing Smart Reports, Faster Dashboards & More</h2>
                <p>We're thrilled to bring you our latest product update packed with powerful new features designed to improve your productivity and streamline your workflow.</p>

                <div class="features">
                    <div class="feature">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                            <path d="M11.251 0a.5.5 0 0 1 .47.676L9.989 5H14.5a.5.5 0 0 1 .41.79l-9 12a.5.5 0 0 1-.91-.29L6.01 11H1.5a.5.5 0 0 1-.41-.79l9-12A.5.5 0 0 1 11.25 0z" />
                        </svg>
                        <div>
                            <strong>Lightning Performance</strong>
                            <p>Experience 2x faster dashboard loads with our upgraded engine.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                            <path d="M1 13.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zm2-2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H3.5a.5.5 0 0 1-.5-.5zm4-2a.5.5 0 0 1 .5-.5H9a.5.5 0 0 1 0 1H7.5a.5.5 0 0 1-.5-.5zm4-2a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H11.5a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <div>
                            <strong>Advanced Reports</strong>
                            <p>Build detailed reports with new chart types and export options.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M13 7a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM9.5 7a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0zM3 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 7c0-1.104-.896-2-2-2H2c-1.104 0-2 .896-2 2v.5h9V14zm1 0c0-1.105.672-2 1.5-2h2c.828 0 1.5.895 1.5 2v.5H10v-.5z" />
                        </svg>
                        <div>
                            <strong>Team Collaboration</strong>
                            <p>Invite users, assign roles, and collaborate in real-time.</p>
                        </div>
                    </div>
                </div>

                <p style="text-align: center;">
                    <a href="#" class="btn">Explore the Update</a>
                </p>

                <p>Thank you for being a valued member of the <strong>UBold</strong> community!</p>
            </div>
            <div class="email-footer">
                <a href="#">Unsubscribe</a> or <a href="#">Contact Support</a>
            </div>
        </div>
    </div>
</body>

</html>