<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPDA — BPD Kaltim Kaltara</title>
    @vite(['resources/css/app.css'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #0C2D57 0%, #0f3a6e 40%, #0c4a8a 70%, #0EA5E9 100%); }
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.12); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(12,45,87,0.15); }
        @keyframes fadeUp { from { opacity:0; transform: translateY(30px); } to { opacity:1; transform: translateY(0); } }
        .fade-up { animation: fadeUp 0.7s ease forwards; }
        .fade-up-d1 { animation-delay: 0.1s; opacity: 0; }
        .fade-up-d2 { animation-delay: 0.25s; opacity: 0; }
        .fade-up-d3 { animation-delay: 0.4s; opacity: 0; }
        .fade-up-d4 { animation-delay: 0.55s; opacity: 0; }
    </style>
</head>
<body class="bg-slate-50">

    <!-- NAVBAR -->
    <header class="fixed inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between px-6 py-4 lg:px-12 bg-[#0C2D57]/90 backdrop-blur-lg border-b border-white/10">
            <a href="/" class="flex items-center gap-2.5">
                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-white text-base font-bold">📄</span>
                <div>
                    <span class="text-white font-bold text-sm tracking-wide">SIPDA</span>
                    <span class="text-sky-300 text-[10px] block -mt-0.5 font-medium">BPD Kaltim Kaltara</span>
                </div>
            </a>
            <a href="{{ route('login') }}"
               class="rounded-lg bg-white px-5 py-2 text-sm font-semibold text-[#0C2D57] hover:bg-sky-50 transition-all duration-200 shadow-sm">
                Masuk
            </a>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero-gradient relative min-h-screen flex items-center overflow-hidden">
        <!-- Decorative circles -->
        <div class="absolute top-20 -left-20 w-72 h-72 rounded-full bg-sky-400/10 blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 rounded-full bg-blue-400/10 blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-sky-500/5 blur-3xl"></div>

        <div class="relative max-w-6xl mx-auto px-6 lg:px-8 pt-32 pb-20 text-center">
            <!-- Badge -->
            <div class="fade-up fade-up-d1 inline-flex items-center gap-2 rounded-full glass px-4 py-1.5 mb-8">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-xs font-medium text-sky-200">Bank Pembangunan Daerah Kaltim Kaltara</span>
            </div>

            <!-- Heading -->
            <h1 class="fade-up fade-up-d2 text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight tracking-tight">
                Sistem Informasi<br>
                <span class="bg-gradient-to-r from-sky-300 to-cyan-300 bg-clip-text text-transparent">Pencatatan & Arsip</span><br>
                Dokumen Debitur
            </h1>

            <!-- Subtitle -->
            <p class="fade-up fade-up-d3 mt-6 text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Kelola, catat, dan arsipkan dokumen debitur dengan mudah melalui sistem terintegrasi yang aman, efisien, dan terpercaya.
            </p>

            <!-- CTA -->
            <div class="fade-up fade-up-d4 mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('login') }}"
                   class="rounded-xl bg-white px-8 py-3.5 text-sm font-bold text-[#0C2D57] hover:bg-sky-50 transition-all duration-300 shadow-lg shadow-black/20 hover:shadow-xl hover:shadow-black/30">
                    Mulai Sekarang →
                </a>
            </div>

            <!-- Stats -->
            <div class="fade-up fade-up-d4 mt-16 grid grid-cols-3 gap-6 max-w-lg mx-auto">
                <div class="glass rounded-xl p-4">
                    <p class="text-2xl font-bold text-white">100%</p>
                    <p class="text-xs text-slate-400 mt-1">Aman</p>
                </div>
                <div class="glass rounded-xl p-4">
                    <p class="text-2xl font-bold text-white">24/7</p>
                    <p class="text-xs text-slate-400 mt-1">Akses</p>
                </div>
                <div class="glass rounded-xl p-4">
                    <p class="text-2xl font-bold text-white">Real-time</p>
                    <p class="text-xs text-slate-400 mt-1">Data</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block text-xs font-bold text-sky-600 bg-sky-50 rounded-full px-3 py-1 mb-4 uppercase tracking-wider">Fitur Unggulan</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-[#0C2D57]">Solusi Arsip Digital Terpadu</h2>
                <p class="mt-4 text-slate-500 max-w-xl mx-auto">Platform manajemen arsip dokumen debitur yang dirancang khusus untuk kebutuhan perbankan modern.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card-hover rounded-2xl border border-slate-100 bg-white p-8 text-center">
                    <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0C2D57] mb-2">Arsip Digital</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Simpan dan kelola dokumen debitur secara digital dengan sistem yang terstruktur dan mudah diakses.</p>
                </div>

                <!-- Feature 2 -->
                <div class="card-hover rounded-2xl border border-slate-100 bg-white p-8 text-center">
                    <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg shadow-emerald-500/30">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0C2D57] mb-2">Keamanan Terjamin</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Data dilindungi dengan autentikasi berlapis dan kontrol akses berbasis peran pengguna.</p>
                </div>

                <!-- Feature 3 -->
                <div class="card-hover rounded-2xl border border-slate-100 bg-white p-8 text-center">
                    <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-violet-500 to-violet-600 text-white shadow-lg shadow-violet-500/30">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0C2D57] mb-2">Monitoring Real-time</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Pantau aktivitas arsip secara real-time melalui dashboard yang informatif dan mudah dipahami.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#0C2D57] py-8">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 text-center">
            <p class="text-sm text-slate-400">© {{ date('Y') }} SIPDA — BPD Kaltim Kaltara. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
