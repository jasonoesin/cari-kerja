<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .content{
            font-weight: normal;
        }
    </style>
</head>
<body>
    @includeIf('header')

    <div class="w-[100vw] pt-[3rem] content">
        @yield('content')
    </div>


    @includeIf('footer')
</body>
</html>
