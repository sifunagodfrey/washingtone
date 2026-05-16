{{-- -------------------
2FA Email
------------------- --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verification Code</title>
</head>

<body style="margin:0;padding:0;background:#f5f7fb;font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:40px 0;">

                <table width="500" style="background:#fff;border-radius:8px;padding:30px;">

                    <tr>
                        <td align="center">
                            <h2>Verification Code</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;color:#555;padding:10px 0;">
                            Use this code to continue
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:20px;">
                            <div style="font-size:32px;font-weight:bold;letter-spacing:5px;">
                                {{ $code }}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:center;font-size:12px;color:#999;">
                            Do not share this code
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>