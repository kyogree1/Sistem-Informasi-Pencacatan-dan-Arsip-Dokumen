<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIPDA') }} — BPD Kaltim Kaltara</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-12 bg-gradient-to-br from-sky-50 via-white to-amber-50 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900">
            <div>
                <a href="/" class="inline-flex items-center gap-3">
                    <x-application-logo class="w-16 h-16 fill-current text-slate-400" />
                    <div class="hidden sm:block">
                        <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">SIPDA</p>
                        <p class="text-xs text-slate-400">BPD Kaltim Kaltara</p>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-5 bg-white/90 dark:bg-slate-900/80 border border-slate-200/70 dark:border-slate-800 shadow-soft overflow-hidden sm:rounded-2xl backdrop-blur">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
