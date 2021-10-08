<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">
<div id="app" class="min-h-screen bg-gray-100">
    <!-- Page Content -->
    <main>
        <!-- Background color split screen for large screens -->
        <div class="fixed top-0 left-0 w-full h-full bg-white" aria-hidden="true"></div>
        {{--                <div class="fixed top-0 right-0 w-1/2 h-full bg-gray-50" aria-hidden="true"></div>--}}
        <div class="relative min-h-screen flex flex-col">
            @include('layouts.navigation')
            @if($errors->any())
                <div id="error" class="absolute right-0 bg-yellow-50 p-4 rounded flex items-start text-yellow-600 my-4 shadow-lg max-w-xl mx-auto">
                    <div class="text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 1l-12 22h24l-12-22zm-1 8h2v7h-2v-7zm1 11.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>
                    </div>
                    <div class=" px-3">
                        <h3 class="text-yellow-800 font-semibold tracking-wider">
                            Warning
                        </h3>
                        <p class="pt-2 text-yellow-700">
                            {{$errors->first()}}
                        </p>
                    </div>
                </div>
        @endif
        <!-- 3 column wrapper -->
            <div class="flex-grow w-full max-w-full mx-auto xl:px-8 lg:flex">
                <!-- Left sidebar & main wrapper -->
                <div class="flex-1 min-w-0 bg-white xl:flex">
                    @include('layouts.sidebar')
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
