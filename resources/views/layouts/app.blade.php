<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="preload" as="image" href="{{ asset('assets/logo/favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/logo/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-slate-100">
    <div class="app">
        @if($nav_bar == true)
        <nav class="bg-white">
            <ul class="flex gap-2 justify-center">
                <li class="py-6 px-5 font-medium hover:font-semibold text-slate-500 cursor-pointer hover:text-slate-900" onclick="location.href='<?= route('home') ?>'">Generate Report</li>
                <li class="py-6 px-5 font-medium hover:font-semibold text-slate-500 cursor-pointer hover:text-slate-900" onclick="location.href='<?= route('history') ?>'">History</li>
            </ul>
        </nav>
        @endif
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
@yield('script')

</html>