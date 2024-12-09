<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') | Rawr PetShop</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/favicon-16x16.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <style>
        .rating:not(:checked) > input {
            position: absolute;
            appearance: none;
        }

        .rating:not(:checked) > label {
            float: right;
            cursor: pointer;
            font-size: 20px;
            color: #666;
        }

        .rating:not(:checked) > label:before {
            content: '★';
        }

        .rating > input:checked ~ label {
            color: #ffa723;
        }
    </style>
</head>
<body>

@include('partials.navbar')

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/jquery.spinner.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="{{ asset('assets/js/notyf.settings.js') }}"></script>

<script>
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 3,
        rewind: true,
        breakpoints: {
            640: {
                perPage: 2,
                gap: '.7rem',
                height: '12rem',
            },
            480: {
                perPage: 1,
                gap: '.7rem',
                height: '12rem',
            },
        }
    });
    splide.mount();
</script>

</body>
</html>
