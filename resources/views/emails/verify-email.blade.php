<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 24px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden;">
        <tr>
            <td style="padding: 24px; background: #07202A; color: #ffffff;">
                <h1 style="margin: 0; font-size: 20px;">Nazleh Ounce Email Verification</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 24px; color: #1f2933;">
                <p>Hello {{ $user->name }},</p>
                <p>Thank you for creating your Nazleh Ounce account.</p>
                <p>Please confirm your email address to activate your account and access your dashboard.</p>
                <p style="margin: 28px 0;">
                    <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 12px 20px; background: #07202A; color: #8BD4E2; text-decoration: none; border: 1px solid #8BD4E2; border-radius: 4px;">
                        Verify Email Address
                    </a>
                </p>
                <p>If the button does not work, use this link:</p>
                <p style="word-break: break-all;">
                    <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
                </p>
                <p style="margin-top: 24px;">If you did not create this account, you can ignore this email.</p>
            </td>
        </tr>
    </table>
</body>
</html>

