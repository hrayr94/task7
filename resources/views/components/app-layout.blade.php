<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<div class="min-h-screen">
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@livewireScripts
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
