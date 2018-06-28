<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Registration Email</title>

    <style type="text/css">
        /* Take care of image borders and formatting */

        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            border: 0;
            outline: none;
        }

        a img {
            border: none;
        }

        /* General styling */

        td, h1, h2, h3 {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        td {
            font-size: 13px;
            line-height: 150%;
            text-align: left;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
        }

        table {
            border-collapse: collapse !important;
        }

        h1, h2, h3 {
            padding: 0;
            margin: 0;
            color: #444444;
            font-weight: 400;
            line-height: 110%;
        }

        h1 {
            font-size: 35px;
        }

        h2 {
            font-size: 30px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 18px;
            font-weight: normal;
        }

        .important-font {
            color: #21BEB4;
            font-weight: bold;
        }

        .hide {
            display: none !important;
        }

        .force-full-width {
            width: 100% !important;
        }

        td.desktop-hide {
            font-size: 0;
            height: 0;
            display: none;
            color: #ffffff;
        }

        div.padding {
            padding-left: 20px !important;
            padding-right: 14px !important;
        }

        .button {
            border-radius: 3px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
            color: #FFF;
            display: inline-block;
            text-decoration: none;
            -webkit-text-size-adjust: none;
        }

        .button-blue {
            background-color: #3097D1;
            border-top: 10px solid #3097D1;
            border-right: 18px solid #3097D1;
            border-bottom: 10px solid #3097D1;
            border-left: 18px solid #3097D1;
            margin-bottom: 40px;
        }
    </style>

    <style type="text/css" media="screen">
        @media screen {
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
            @import url(https://fonts.googleapis.com/css?family=Arvo:700);
            /* Thanks Outlook 2013! */
            td, h1, h2, h3 {
                font-family: 'Open Sans', 'Arvo', 'Helvetica Neue', Arial, sans-serif !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 600px)">
        /* Mobile styles */
        @media only screen and (max-width: 600px) {

            table[class="w320"] {
                width: 320px !important;
            }

            table[class="w300"] {
                width: 300px !important;
            }

            table[class="w290"] {
                width: 290px !important;
            }

            td[class="w320"] {
                width: 320px !important;
            }

            td[class~="mobile-padding"] {
                padding-left: 14px !important;
                padding-right: 14px !important;
            }

            td[class*="mobile-padding-left"] {
                padding-left: 14px !important;
            }

            td[class*="mobile-padding-right"] {
                padding-right: 14px !important;
            }

            td[class*="mobile-block"] {
                display: block !important;
                width: 100% !important;
                text-align: left !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                padding-bottom: 15px !important;
            }

            td[class*="mobile-no-padding-bottom"] {
                padding-bottom: 0 !important;
            }

            td[class~="mobile-center"] {
                text-align: center !important;
            }

            table[class*="mobile-center-block"] {
                float: none !important;
                margin: 0 auto !important;
            }

            *[class*="mobile-hide"] {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
                line-height: 0 !important;
                font-size: 0 !important;
            }

            td[class*="mobile-border"] {
                border: 0 !important;
            }

            td[class*="desktop-hide"] {
                display: block !important;
                font-size: 13px !important;
                height: 61px !important;
                padding-top: 10px !important;
                padding-bottom: 10px !important;
                color: #444444 !important;
            }
        }
    </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none"
      bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
        <td align="center" valign="top" bgcolor="#ffffff" width="100%">

            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td style="padding-top:20px">
                        <center>
                            <a href="#" style="text-decoration:none;">
                                <img src="{{ asset('images/logo_azal.png') }}" width="200" alt="Azal Logo"/>
                            </a>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                <tr>
                                    <td align="left" class="mobile-padding" style="padding:20px">

                                        <br class="mobile-hide"/>

                                        <div>
                                            <h1 style='font-family: "Arvo", sans-serif; font-size: 42px;'>
                                                Регистрация в <br> Azal Virtual Airlines
                                            </h1><br>
                                            <br>
                                            <h2 style='font-family: "Arvo", sans-serif; font-size: 21px;'>
                                                Здравствуйте, {{ $user->first_name }}! </h2> <br/> <br/>
                                            <div class="padding" style="border-left:1px solid #e7e7e7;">
                                                Спасибо за регистрацию в Azal Virtual Airlines. <br>
                                                Активируйте ваш аккаунт, нажав кнопку ниже.
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <a class="button button-blue" href="{{ $action }}" target="_blank">Активировать</a>

                        </center>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</body>
</html>