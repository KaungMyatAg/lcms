<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Blog CMS</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
     
     @yield('content')

     <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>