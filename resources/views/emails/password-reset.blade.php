{{-- -------------------
Password Reset Email
------------------- --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body style="margin:0;padding:0;background:#f5f7fb;font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:40px 0;">

                <table width="500" style="background:#fff;border-radius:8px;padding:30px;">

                    <tr>
                        <td align="center">
                            <h2>Reset Password</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;color:#555;padding:10px 0;">
                            Click below to reset your password
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="{{ $url }}"
                                style="background:#111;color:#fff;padding:12px 25px;text-decoration:none;border-radius:5px;">
                                Reset Password
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;font-size:12px;color:#999;">
                            If you didn’t request this, ignore
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>