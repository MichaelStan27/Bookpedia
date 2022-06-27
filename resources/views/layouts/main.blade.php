<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('title')</title>
</head>

<body class="bg-[#F2F2F2]">
    @include('partials.toast-notification')
    @include('partials.navbar')
    @yield('content')
</body>

</html>
