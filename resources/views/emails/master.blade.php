<!doctype>
<html lang="en-US">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VolumeShoot</title>
    <style type="text/css">
        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;}

        body {
            background-color: #f1f1f1;
            font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 15px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; }
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            line-height: 1.5;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; }

        .footer a:visited {
            font-weight: bold; font-size: 12px; color: #A7A6A6; text-decoration: none;
        }
        span.yshortcuts:hover {
            color: #000; background-color: none; border: none;
        }
        span.yshortcuts:active {
            color: #000; background-color: none; border: none;
        }
        span.yshortcuts:focus {
            color: #000; background-color: none; border: none;
        }
        a:visited {
            color: #19BB40; text-decoration: none;
        }
        a:focus {
            color: #19BB40; text-decoration: underline;
        }
        a:hover {
            color: #19BB40; text-decoration: underline;
        }
        /* mimic VolumeShoot button appearance for links in email */
        .button {
            border-color: #63aaff;
            background-color: #3b9dff;
            color: #FFFFFF !important;
            border-width: 1px;
            opacity: 0.8;
            filter: alpha(opacity =80);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 0;
            font-weight: normal;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            padding: 8px 16px;
            font-size: 12px;
            line-height: 1.6;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            text-decoration: none !important;
        }
        @media only screen and (max-device-width: 480px) {
            body[yahoo] #container1 {
                display: block !important;
            }
            body[yahoo] p {
                font-size: 15px;
            }
        }
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            body[yahoo] #container1 {
                display: block !important;
            }
            body[yahoo] p {
                font-size: 12px;
            }
        }
    </style>
</head>
<body style="color: #424242;font-family:sans-serif;
    font-size: 15px;line-height:1.4; -webkit-text-size-adjust: none; -ms-text-size-adjust: none;
    background-color:#f1f1f1; margin: 0; padding: 0;" alink="#FF0000" link="#FF0000" bgcolor="#f1f1f1" text="#000000" yahoo="fix">

<table cellpadding="0" cellspacing="0" border="0" bgcolor="#f7f7f7" align="center" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f1f1f1;">
    <tr>
        <td style="font-family: sans-serif; font-size: 15px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
            <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
                <table cellpadding="0" cellspacing="0" border="0" bgcolor="#f7f7f7"  align="center" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f7f7f7;">
                    <tbody>
                    <tr style="text-align: center" align="center">
                        <td style="border:1px solid #dddddd; border-width: 1px 1px 0;vertical-align:top;padding-bottom: 30px">
                            <div style="padding-top:10px;text-align: center">
                                @yield('headline')
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-collapse: collapse;vertical-align: top;">
                            <div style="background-color:#ffffff;border:1px solid #dddddd;border-width: 0 1px 1px">
                                @yield('content')
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    <tr class="footer" style="text-align: center; color: #a7a6a6;" align="center">
        <td style="border-collapse: collapse; padding-top: 10px;">
            <p style="color: #A7A6A6; font-size: 13px; line-height: 18px; margin: 0 0 7px; padding: 0;">

            </p>
        </td>
    </tr>
</table>

</body>
</html>
