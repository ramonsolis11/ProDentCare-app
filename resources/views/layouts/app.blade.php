<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="@yield('meta-description', 'Prodentcare - Cuidado dental profesional')">
    <meta name="author" content="Prodentcare">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodentcare - @yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')

    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('partials.footer')


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>
</html>

