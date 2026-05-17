<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SIPDA BPD Kaltim Kaltara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .brand-gradient { background: linear-gradient(135deg, #2982C6 0%, #206CA7 50%, #16568A 100%); }
    </style>
</head>
<body class="h-full bg-gradient-to-br from-sky-50 via-white to-amber-50 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">
    <div class="flex min-h-full">

        <!-- LEFT — Branding Panel -->
        <div class="hidden lg:flex lg:w-1/2 brand-gradient relative overflow-hidden items-center justify-center">
            <!-- Decorative -->
            <div class="absolute top-20 -left-20 w-72 h-72 rounded-full bg-sky-400/10 blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full bg-blue-400/10 blur-3xl"></div>

            <div class="relative z-10 max-w-md px-12 text-center">
                <div class="mb-8 mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo BPD Kaltimtara" class="h-12 drop-shadow-md">
                </div>
                <h1 class="text-3xl font-bold text-white mb-3">SIPDA</h1>
                <p class="text-sky-200 text-sm font-medium mb-2">Sistem Informasi Pencatatan & Arsip Dokumen</p>
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/15 px-4 py-1.5 mt-4">
                    <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs text-sky-200 font-medium">BPD Kaltim Kaltara</span>
                </div>

                <div class="mt-12 grid grid-cols-3 gap-4">
                    <div class="rounded-xl bg-white/8 backdrop-blur-sm border border-white/10 p-3">
                        <p class="text-lg font-bold text-white">Aman</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Terenkripsi</p>
                    </div>
                    <div class="rounded-xl bg-white/8 backdrop-blur-sm border border-white/10 p-3">
                        <p class="text-lg font-bold text-white">Cepat</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Real-time</p>
                    </div>
                    <div class="rounded-xl bg-white/8 backdrop-blur-sm border border-white/10 p-3">
                        <p class="text-lg font-bold text-white">24/7</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Akses</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT — Login Form -->
        <div class="flex flex-1 items-center justify-center px-6 py-12 relative">
            <div class="absolute right-6 top-6 hidden sm:block">
                <button type="button" onclick="window.toggleSipdaTheme()" class="inline-flex items-center justify-center h-9 w-9 rounded-xl bg-white/70 border border-slate-200 text-slate-600 hover:text-slate-900 hover:bg-white transition dark:bg-slate-800 dark:border-slate-700 dark:text-slate-200">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0112.003 21C6.477 21 2 16.523 2 10.997c0-4.133 2.48-7.687 6.033-9.253a.75.75 0 01.98.946A7.5 7.5 0 0018.31 14.99a.75.75 0 01.943 1.012z"/></svg>
                </button>
            </div>
            <div class="w-full max-w-sm">

                <div class="lg:hidden text-center mb-8">
                    <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl bg-white border border-slate-100 shadow-sm p-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo BPD Kaltimtara" class="w-full">
                    </div>
                    <h1 class="text-xl font-bold text-[#12284B]">SIPDA</h1>
                    <p class="text-xs text-slate-500">BPD Kaltim Kaltara</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Masuk ke Akun</h2>
                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Silakan masukkan kredensial Anda</p>
                </div>

                @if (session('status'))
                    <div class="mt-4 rounded-xl bg-emerald-50 border border-emerald-200 p-3 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                    @csrf

                    <!-- Personal Number -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-1.5">Personal Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                            </div>
                            <input type="text" name="personal_number" value="{{ old('personal_number') }}" required autofocus
                                class="input-field pl-10 @error('personal_number') border-red-400 @enderror"
                                placeholder="Masukkan Personal Number">
                        </div>
                        @error('personal_number')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div x-data="{ show: false }">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                            </div>
                            <input :type="show ? 'text' : 'password'" name="password" required
                                class="input-field pl-10 pr-10 @error('password') border-red-400 @enderror"
                                placeholder="Masukkan password">
                            <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-sky-600">
                                <svg x-show="!show" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <svg x-show="show" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-300">Ingat saya</span>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="btn btn-primary w-full py-2.5">
                        Masuk
                    </button>
                </form>

                <p class="mt-8 text-center text-xs text-slate-400 dark:text-slate-500">
                    © {{ date('Y') }} SIPDA — BPD Kaltim Kaltara
                </p>
            </div>
        </div>
    </div>
</body>
</html>
