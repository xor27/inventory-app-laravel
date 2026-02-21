<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | Investory App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEODash CSS --}}
    <link rel="stylesheet"
          href="{{ asset('seodash/assets/css/styles.min.css') }}">
</head>

<body class="bg-light">

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('seodash/assets/images/logos/logo-light.svg') }}"
                         width="120">
                </div>

                @yield('content')
            </div>
        </div>
    </div>
</div>

</body>
</html>