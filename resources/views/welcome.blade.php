<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite(['resources/css/app.css'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>Sistem Informasi Pencatatan dan Arsip Dokumen</title>
</head>

<body class="bg-white">
<div x-data="{ showLoading: false }" @loading-start.window="showLoading = true">

  <!-- LOADING OVERLAY -->
  <div x-show="showLoading" class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center" x-transition>
    <div class="bg-white rounded-lg p-8 text-center">
      <div class="mb-4 flex justify-center">
        <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div>
      </div>
      <p class="text-gray-900 font-semibold">Memuat Sistem...</p>
      <p class="text-gray-600 text-sm mt-2">Harap tunggu sebentar</p>
    </div>
  </div>

  <!-- HEADER / NAVBAR -->
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

      <!-- LOGO -->
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">SIPDA</span>
          <span class="text-lg font-bold text-indigo-600">📄 SIPDA</span>
        </a>
      </div>
    </nav>
  </header>

  <!-- HERO -->
  <main class="relative isolate px-6 pt-14 lg:px-8">

    <!-- BACKGROUND TOP -->
    <div aria-hidden="true"
      class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
      <div
        class="relative left-1/2 aspect-[1155/678] w-[36rem] -translate-x-1/2 rotate-30
               bg-gradient-to-tr from-pink-400 to-indigo-400 opacity-30 sm:w-[72rem]"
        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
      </div>
    </div>

    <!-- CONTENT -->
    <div class="mx-auto max-w-2xl pt-24 pb-32 sm:pt-28 sm:pb-40 lg:pt-32 lg:pb-48 text-center">


      <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div
          class="rounded-full px-3 py-1 text-sm text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
          Solusi manajemen dokumen yang aman dan terintegrasi.
        </div>
      </div>

      <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">
        Sistem Pencatatan dan Arsip Dokumen
      </h1>

      <p class="mt-8 text-lg text-gray-500 sm:text-xl">
        Kelola, catat, dan arsipkan dokumen Anda dengan mudah melalui sistem
        terintegrasi yang aman dan efisien.
      </p>

      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a
        href="{{ route('login') }}"
        class="rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow hover:bg-indigo-500 focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600"
        >
        Mulai Sekarang
    </a>
</div>
</div>
</main>

</div>
</body>
</html>
