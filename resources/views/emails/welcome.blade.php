{{-- -------------------
Welcome Email
------------------- --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body style="margin:0;padding:0;background:#f5f7fb;font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:40px 0;">

                <table width="500" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:8px;padding:30px;">

                    <tr>
                        <td align="center">
                            <h2 style="margin:0;">Welcome to Elite Hub</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:15px 0;text-align:center;color:#555;">
                            Hi {{ $user->first_name }}, your account is ready.
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="{{ url('/') }}"
                                style="background:#111;color:#fff;padding:12px 25px;text-decoration:none;border-radius:5px;">
                                Go to Dashboard
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;color:#999;font-size:12px;">
                            Elite Hub Bootcamp
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>