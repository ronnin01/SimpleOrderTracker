<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/sass/app.scss')
    @vite('resources/css/datatables.min.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>

    <style>
        section{
            padding: 40px 0;
        }
    </style>

    @include('components.navbar')
    @yield('content')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/app.js')
    @vite('resources/js/datatables.min.js')
    <script>
        $(document).ready(function(){
            $("#foods").DataTable();
            $("#cart").DataTable();

            window.Echo.private('update-order.' + <?=auth()->check() ? auth()->user()->id : ""?>)
            .listen('.UpdateDeliveryOrder', (e) => {
                console.log(e.test)
                document.getElementById("progress-bar").style.width = e.test+"%";
            })
        })
    </script>
</body>
</html>