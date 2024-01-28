<!DOCTYPE html>

<html lang="en" class="">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('head')
</head>

<body>
    <div class="">
        <div>
            @include('layouts.sidebar')
            <div class="bg-white p-4 pt-20 sm:ml-64 dark:bg-gray-700">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap-5.3.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    
</body>
@yield('script')

</html>
