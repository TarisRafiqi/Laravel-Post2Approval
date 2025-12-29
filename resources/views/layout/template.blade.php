<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/bulma.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
</head>

<body>
    <!-- Header -->
    @include('layout.navbar')

    <!-- Layout Container -->
    <div class="layout">
        <!-- Sidebar -->
        @if (!Request::is('/') && !Request::is('login') && !Request::is('register'))
            @include('layout.sidebar')
        @endif

        <!-- Main Content -->
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>

</html>

<style>
    html {
        height: 100%;
    }

    body {
        padding-top: 3.5em;
    }

    .layout {
        display: flex;
        min-height: 100vh;
    }

    .content {
        flex-grow: 1;
        /* Biar konten menyesuaikan lebar sisanya */
        padding: 20px;
    }
</style>
