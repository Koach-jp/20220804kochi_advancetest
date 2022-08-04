<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    {{-- ↓ datepicker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{{asset('js/datepicker-ja.js')}}"></script>
    @stack('css')
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>
    <div class="content">
        @yield('content')
    </div>

    <footer>
        <a href="/" class="to-top">TOPに戻る</a>
    </footer>
    @livewireScripts
</body>

</html>
