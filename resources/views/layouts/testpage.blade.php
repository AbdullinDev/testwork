<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>TestPage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <form method="post" class="form-custom">
                          <div class="form-row">
                            <div class="col-xl-10">
                              <label for="url_site">Введите url веб-ресурса.</label>
                              <input type="text" name="url_site" class="form-control" id="url_site" placeholder="http://site.ru" value="">
                              {{ csrf_field() }}
                            </div>
                            <div class="col-xl-2"><button class="btn btn-primary" type="submit">Отправить</button></div>
                          </div>
                          <div class="alert-success">
                            @if (session('status')) 
                              <div class="download-site">{{ session('status') }}</div>
                            @endif   
                          </div>
                          @if (count($errors) > 0)
                            <div class="alert-error">
                              @foreach($errors->all() as $error)
                                <div class="alert-error-i">{{ $error }}</div>
                              @endforeach
                            </div>
                          @endif
                        </form>

                        <div class="table-responsive list-files">
                            <h2>Список веб-ресурсов для скачивания</h2>
                            <table class="table table-hover table-bordered">
                              <thead>
                                <tr>
                                  <th>№</th>
                                  <th>Название файла</th>
                                  <th>Размер файла</th>
                                  <th>Скачать</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  if(isset($files)) {
                                  $filesList = (array)(json_decode($files));
                                  foreach($filesList as $key => $f) {
                                @endphp
                                <tr>
                                  @php $f = (array)$f; @endphp
                                  <td class="number-file">@php echo $key; @endphp</td>
                                  <td class="name-file">@php echo $f['name']; @endphp</td>
                                  <td class="size-file">@php echo $f['size']; @endphp</td>
                                  <td class="download-file"><a href="@php echo $f['link']; @endphp" class="btn btn-success btn-custom">Скачать</a></td>                       
                                </tr>
                                @php
                                  }
                                  }
                                @endphp
                              </tbody>
                            </table>
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
