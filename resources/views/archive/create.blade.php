<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0C2D57] leading-tight">Tambah Arsip</h2>
    </x-slot>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#0C2D57] via-[#0f3a6e] to-[#0c4a8a] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center gap-3">
                    <a href="{{ route('archive.index') }}" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-white hover:bg-white/25 transition">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Tambah Arsip Dokumen</h1>
                        <p class="text-sky-200 text-sm">Input data arsip dokumen debitur baru</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 -mt-5 relative z-20 pb-10">
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">

                <!-- FORM HEADER -->
                <div class="bg-gradient-to-r from-slate-50 to-slate-100/50 px-6 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-md shadow-blue-500/20">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-[#0C2D57]">Form Data Arsip</h3>
                            <p class="text-xs text-slate-500">Lengkapi semua informasi dokumen debitur</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="h-4 w-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                <span class="font-semibold">Terdapat kesalahan:</span>
                            </div>
                            <ul class="list-disc pl-5 space-y-1">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('archive.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Nama Debitur --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Debitur <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                    </div>
                                    <input type="text" name="nama_debitur" value="{{ old('nama_debitur') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="Masukkan nama debitur">
                                </div>
                            </div>

                            {{-- No PK --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">No PK <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"/></svg>
                                    </div>
                                    <input type="text" name="no_pk" value="{{ old('no_pk') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="Contoh: PK-001-2026">
                                </div>
                            </div>

                            {{-- Nilai Kredit --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nilai Kredit <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 rounded px-1.5 py-0.5">Rp</span>
                                    </div>
                                    <input type="number" name="nilai_kredit" value="{{ old('nilai_kredit') }}" step="0.01" required
                                        class="w-full rounded-xl border-slate-200 pl-14 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="0">
                                </div>
                            </div>

                            {{-- Divisi Dokumen --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Divisi Dokumen <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 0v.008v-.008z"/></svg>
                                    </div>
                                    <input type="text" name="dokumen_divisi" value="{{ old('dokumen_divisi') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="Contoh: KREDIT / LEGAL">
                                </div>
                            </div>

                            {{-- Jumlah Bantex --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jumlah Bantex <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                    </div>
                                    <input type="number" name="jumlah_bantex" value="{{ old('jumlah_bantex') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="0">
                                </div>
                            </div>

                            {{-- Lokasi Dokumen --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi Dokumen <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                    </div>
                                    <input type="text" name="lokasi_dokumen" value="{{ old('lokasi_dokumen') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="Contoh: Rak A1 – Lemari 1">
                                </div>
                            </div>

                            {{-- PIC --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">PIC <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <input type="text" name="pic" value="{{ old('pic') }}" required
                                        class="w-full rounded-xl border-slate-200 pl-10 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                        placeholder="Nama penanggung jawab">
                                </div>
                            </div>
                        </div>

                        {{-- Keterangan --}}
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan</label>
                            <textarea name="keterangan" rows="3"
                                class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                        </div>

                        {{-- INFO --}}
                        <div class="flex items-start gap-2 rounded-xl bg-sky-50 border border-sky-100 p-3 text-xs text-sky-700">
                            <svg class="h-4 w-4 text-sky-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
                            <span>Arsip yang disimpan akan tercatat otomatis di dashboard dan dapat dicari melalui halaman Arsip Dokumen.</span>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                            <a href="{{ route('archive.index') }}" class="rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-200 transition">Batal</a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#0C2D57] to-[#0c4a8a] px-6 py-2.5 text-sm font-semibold text-white hover:shadow-lg transition-all shadow-sm">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Simpan Arsip
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
