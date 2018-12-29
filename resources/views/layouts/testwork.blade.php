<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>TestWork</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-4.1.3/css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/test.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/test_fonts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/test_media.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="content-page">
                        <div class="content-center">
                            <div class="title-page">
                                <h1>Тестовое задание</h1>
                            </div>

                            <div class="links-page">
                                <a href="{{ url('testpage') }}" class="btn btn-primary btn-custom">Проверить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="{{ asset('assets/libs/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-4.1.3/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/test.js') }}"></script>
</html>
