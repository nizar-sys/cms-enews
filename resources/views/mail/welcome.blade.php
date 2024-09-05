<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to our website</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td align="center" style="padding: 20px; background-color: #007bff; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                            <h1 style="color: #ffffff; font-size: 24px; margin: 0;">Welcome, {{ $user->name }}!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding: 30px; font-size: 16px; color: #333333; line-height: 1.6;">
                            <p style="margin: 0 0 15px;">Welcome to our website. We're glad to have you on board.</p>
                            <p style="margin: 0 0 15px;">If you have any questions, feel free to reach out to us at any time.</p>
                            <p style="margin: 0;">Best regards,<br>The Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
