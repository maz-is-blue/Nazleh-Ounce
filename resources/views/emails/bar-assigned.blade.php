<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Assigned</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 24px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden;">
        <tr>
            <td style="padding: 24px; background: #07202A; color: #ffffff;">
                <h1 style="margin: 0; font-size: 20px;">Nazleh Ounce Verification</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 24px; color: #1f2933;">
                <p>Hello {{ $user->name }},</p>
                <p>Your Nazleh Ounce bar has been assigned and verified.</p>
                <p><strong>Serial Number:</strong> {{ $bar->display_serial ?? 'Pending' }}</p>
                <p><strong>Metal:</strong> {{ ucfirst($bar->metal_type) }}</p>
                <p><strong>Weight:</strong> {{ $bar->weight }} g</p>
                <p><strong>Purity:</strong> {{ $bar->purity ?? '&mdash;' }}</p>
                <p><strong>Registered Email:</strong> {{ $user->email }}</p>
                <p><strong>Registered Phone:</strong> {{ $user->phone ?? '&mdash;' }}</p>
                <p><strong>Registered Location:</strong> {{ $user->location ?? '&mdash;' }}</p>
                <p>You can verify your bar here:</p>
                <p><a href="{{ route('bar.show', $bar->public_id) }}">View Verification</a></p>
                @if ($setupUrl)
                    <hr style="border: none; border-top: 1px solid #e4e4e4; margin: 24px 0;">
                    <p><strong>Set Up Your Account</strong></p>
                    <p>Use the link below to set your password and access your collection:</p>
                    <p>
                        <a href="{{ $setupUrl }}" style="display: inline-block; padding: 12px 20px; background: #07202A; color: #8BD4E2; text-decoration: none; border: 1px solid #8BD4E2; border-radius: 4px;">
                            Set Up Your Account
                        </a>
                    </p>
                    <p style="color: #999; font-size: 12px;">This link expires in 60 minutes.</p>
                @endif
            </td>
        </tr>
    </table>
</body>
</html>
