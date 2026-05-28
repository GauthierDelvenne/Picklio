<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
       style="box-sizing: border-box;  position: relative;  background-color: #fafafa; margin: 0; padding: 0; width: 100%;">
    <tr>
        <td align="center" style="box-sizing: border-box;  position: relative;">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
                   style="box-sizing: border-box;  position: relative;  margin: 0; padding: 0; width: 100%;">
                <tr>
                    <td class="header"
                        style="box-sizing: border-box;  position: relative; padding: 25px 0; text-align: center;">
                        <a href="{{route('front.home')}}"
                           style="box-sizing: border-box;  position: relative; color: #18181b; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                            <img src="{{asset('images/logo-name.svg')}}" class="logo" alt="Picklio" title="Picklio"
                                 style="box-sizing: border-box;  position: relative; max-width: 100%; border: none; height: 75px; margin-top: 15px; margin-bottom: 10px; max-height: 75px; width: auto;">
                        </a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0"
                        style="box-sizing: border-box;  position: relative;  background-color: #fafafa; border-bottom: 1px solid #fafafa; border-top: 1px solid #fafafa; margin: 0; padding: 0; width: 100%; border: hidden !important;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation"
                               style="box-sizing: border-box;  position: relative; background-color: #ffffff; border-color: #e4e4e7; border-radius: 4px; border-width: 1px; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1); margin: 0 auto; padding: 0; width: 570px;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell"
                                    style="box-sizing: border-box;  position: relative; max-width: 100vw; padding: 32px;">
                                    <h1 style="box-sizing: border-box;  position: relative; color: #18181b; font-size: 18px; font-weight: bold; margin-top: 0; text-align: center;">
                                        @yield('title')
                                    </h1>
                                    <div style="box-sizing: border-box;  position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        @yield('description')
                                    </div>
                                    <table class="action" align="center" width="100%" cellpadding="0"
                                           cellspacing="0" role="presentation"
                                           style="box-sizing: border-box;  position: relative;  margin: 30px auto; padding: 0; text-align: center; width: 100%; float: unset;">
                                        <tr>
                                            <td align="center" style="box-sizing: border-box;  position: relative;">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       role="presentation"
                                                       style="box-sizing: border-box;  position: relative;">
                                                    <tr>
                                                        <td align="center"
                                                            style="box-sizing: border-box;  position: relative;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                   role="presentation"
                                                                   style="box-sizing: border-box;  position: relative;">
                                                                <tr>
                                                                    <td style="box-sizing: border-box;  position: relative;">
                                                                        @yield('button')
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="subcopy" width="100%" cellpadding="0" cellspacing="0"
                                           role="presentation"
                                           style="box-sizing: border-box;  position: relative; border-top: 1px solid #e4e4e7; margin-top: 25px; padding-top: 25px;">
                                        <tr>
                                            <td style="box-sizing: border-box;  position: relative;">
                                                <p style="box-sizing: border-box;  position: relative; line-height: 1.5em; margin-top: 0; text-align: left; font-size: 14px;">
                                                    @yield('trouble')
                                                </p>

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="box-sizing: border-box;  position: relative;">
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation"
                               style="box-sizing: border-box;  position: relative; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                            <tr>
                                <td class="content-cell" align="center"
                                    style="box-sizing: border-box;  position: relative; max-width: 100vw; padding: 32px;">
                                    <p style="box-sizing: border-box;  position: relative; line-height: 1.5em; margin-top: 0; color: #a1a1aa; font-size: 12px; text-align: center;">
                                        © 2026 Picklio.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
