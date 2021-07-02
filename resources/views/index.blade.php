<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Valor - 
    </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar/perfect-scrollbar.css') }}">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    {{-- sweet alert --}}
    <link rel="stylesheet" href="sweetalert2.min.css">

    <style>
        a:link,
        a:hover {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div id="app">
        <template-sidebar></template-sidebar>
        <div id="main">
            <template-navbar></template-navbar>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3 v-text="getroot()"></h3>
                    <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
                </div>
                <section class="section">
                    <router-view></router-view>
                </section>
            </div>
        </div>
    </div>



    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- vue --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- icon --}}
    <script src="{{ asset('js/template/feather-icons/feather.min.js') }}"></script>

    {{-- template --}}
    <script src="{{ asset('js/template/app.js') }}"></script>
    <script src="{{ asset('js/template/main.js') }}"></script>


</body>

</html>
