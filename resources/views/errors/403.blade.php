<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Evita- Admin</title>

        <!-- Loading third party fonts -->
        <link href="{{ URL::asset('fonts/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/error.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height content-page-error">
            <div class="content">
                <div class="title m-b-md">
                    Sorry!
                </div>

                <div style="font-size: 60px;">
                    You mustn't to access!!!
                </div>
            </div>
        </div>
    </body>
</html>
