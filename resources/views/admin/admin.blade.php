<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration')</title>
    @vite('resources/css/app.css')
    </head>
<body>
    <div class="container mx-auto">
        @if(session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium"> </span> {{ session('success') }}
            </div>
        @endif
            @yield('content')
        </div>
    </div>
</body>
</html>