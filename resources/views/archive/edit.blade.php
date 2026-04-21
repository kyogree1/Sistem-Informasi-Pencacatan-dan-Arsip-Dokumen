<x-app-layout>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center gap-3">
                    <a href="{{ route('archive.index') }}" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-white hover:bg-white/25 transition">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit Arsip Dokumen</h1>
                        <p class="text-sky-200 text-sm">Perbarui data arsip dokumen debitur</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 -mt-5 relative z-20 pb-10">
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">

                <!-- FORM HEADER -->
                <div class="bg-gradient-to-r from-slate-50 to-slate-100/50 px-6 py-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-md shadow-blue-500/20">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-[#12284B]">Form Edit Arsip</h3>
                            <p class="text-xs text-slate-500">Perbarui informasi dokumen debitur</p>
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

                    <form action="{{ route('archive.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- SECTION: DATA DEBITUR -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 border-b border-slate-100 pb-2">Informasi Debitur</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                                {{-- CIF --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">CIF <span class="text-red-500">*</span></label>
                                    <input type="text" name="cif" value="{{ old('cif', $arsip->cif) }}" required
                                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm" placeholder="Masukkan CIF">
                                </div>
                                {{-- Nama --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Debitur <span class="text-red-500">*</span></label>
                                    <input type="text" name="nama" value="{{ old('nama', $arsip->nama) }}" required
                                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm" placeholder="Masukkan Nama Debitur">
                                </div>
                                {{-- Nomor Rekening --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor Rekening <span class="text-red-500">*</span></label>
                                    <input type="text" name="nomor_rekening" value="{{ old('nomor_rekening', $arsip->nomor_rekening) }}" required
                                        class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm" placeholder="Masukkan Nomor Rekening">
                                </div>
                                {{-- Plafon --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Plafon <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 rounded px-1.5 py-0.5">Rp</span>
                                        </div>
                                        <input type="number" name="plafon" value="{{ old('plafon', $arsip->plafon) }}" step="0.01" required
                                            class="w-full rounded-xl border-slate-200 pl-14 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm" placeholder="0">
                                    </div>
                                </div>
                                {{-- Status --}}
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status <span class="text-red-500">*</span></label>
                                    <div class="flex items-center gap-4 mt-2.5">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="status" value="Lunas" {{ old('status', $arsip->status) == 'Lunas' ? 'checked' : '' }} required class="text-emerald-500 focus:ring-emerald-500 border-slate-300">
                                            <span class="text-sm font-medium text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">Lunas</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="status" value="Belum Lunas" {{ old('status', $arsip->status) == 'Belum Lunas' ? 'checked' : '' }} required class="text-red-500 focus:ring-red-500 border-slate-300">
                                            <span class="text-sm font-medium text-red-700 bg-red-50 px-2.5 py-1 rounded-full border border-red-200">Belum Lunas</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION: UNGGAH BERKAS -->
                        <div>
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 border-b border-slate-100 pb-2">Upload Dokumen</h4>
                            {{-- Input Berkas --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Pilih Berkas Baru <span class="font-normal text-slate-400">(opsional)</span></label>
                                @if($arsip->berkas)
                                    <div class="mb-3 flex items-center gap-2">
                                        <span class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Berkas saat ini tersedia
                                        </span>
                                        <a href="{{ asset('storage/' . $arsip->berkas) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-700 underline font-semibold">Lihat Berkas</a>
                                    </div>
                                @endif
                                <input type="file" name="berkas"
                                    class="block w-full text-sm text-slate-500
                                      file:mr-4 file:py-2.5 file:px-4
                                      file:rounded-xl file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-[#12284B] file:text-white
                                      hover:file:bg-[#0f3a6e] cursor-pointer"
                                    accept=".pdf,.jpg,.jpeg,.png">
                                <p class="mt-1 text-xs text-slate-400">Format: PDF, JPG, PNG (Max 5MB). Biarkan kosong jika tidak ingin mengubah berkas.</p>
                            </div>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                            <a href="{{ route('archive.index') }}" class="rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-200 transition">Batal</a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] px-6 py-2.5 text-sm font-semibold text-white hover:shadow-lg transition-all shadow-sm">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                                Perbarui Arsip
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
