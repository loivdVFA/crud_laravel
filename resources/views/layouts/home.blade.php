<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title-header')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="{{ asset('/style/home.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="w-full">
        @yield('content')
    </div>
</body>

</html>
