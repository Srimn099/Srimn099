<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <title>b-l0g | {{ $title }}</title>

    <!-- FontAwesome JS -->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.js') }}"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/trix/trix.css') }}">
    <script type="text/javascript" src="{{ asset('assets/plugins/trix/trix.js') }}"></script>

    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"],
        trix-toolbar .trix-button--icon-increase-nesting-level,
        trix-toolbar .trix-button--icon-decrease-nesting-level {
            display: none;
        }

        .img-preview {
            width: 200px !important;
            height: 110px !important;
        }
    </style>
</head>

<body>

    @include('templates/alert')

    <div class="page-wrapper">
        <header></header>
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    @include('templates/navbar')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
