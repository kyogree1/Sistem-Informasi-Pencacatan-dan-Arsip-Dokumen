<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Login | Manajemen Arsip</title>
</head>

<body class="h-full bg-gradient-to-br from-indigo-50 via-white to-blue-50">
<div class="flex min-h-full items-center justify-center px-4">

    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">

        <!-- Logo / Title -->
        <div class="mb-6 text-center">
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-indigo-600 text-white text-xl">
                📄
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Masuk</h1>
            <p class="mt-1 text-sm text-gray-500">
                Sistem Informasi Pencatatan dan Arsip Dokumen
            </p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1 w-full rounded-lg border-gray-300 px-3 py-2
                           @error('email') border-red-500 @enderror"
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="mt-1 w-full rounded-lg border-gray-300 px-3 py-2
                           @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full rounded-lg bg-indigo-600 py-2 text-white hover:bg-indigo-700 transition">
                Sign In
            </button>
        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} Manajemen Arsip
        </p>

    </div>
</div>
</body>
</html>
