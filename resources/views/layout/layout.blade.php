<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We Fashion</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="{{URL::to('css/bootstrap.min.css')}} " rel="stylesheet" />
            <link href="{{URL::to('css/style.css')}} " rel="stylesheet" />
</head>
<body>
    @yield('fils')
</body>
    <!-- Bootstrap core JS-->
    <script src="{{URL::to('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::to('js/script.js')}}"></script>
</html>