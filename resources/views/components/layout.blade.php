<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{--    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />

    <title>
        {{-- @dd(Auth::check())--}}
        Welcome {{Auth::check() ? 'Guest':'Perpus'}}

    </title>
</head>

<body class="mb-48">

<nav class="navbar  px-5 py-3 shadow">
    <div class="container-fluid">

        {{--        slide bar--}}
        <x-slide/>
        {{-- end        slide bar--}}

        <a class="navbar-brand" href="#"> Welcome To {{Auth::check() ? auth()->user()->name:'PT. Ora Genah'}}</a>

        <x-auth/>

    </div>
</nav>
<main>
    {{----}}

    <button class="navbar-toggler" type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon "></span>
    </button>


    {{$slot}}
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.7.0.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>--}}
</body>

</html>
