<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Seng Backoffice</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @if (count($errors) > 0)
        <input type="hidden" id="errorMessage" value="{{ $errors->first() }}">
    @endif
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>
</body>
</html>
