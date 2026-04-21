<x-app-layout>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center gap-3">
                    <a href="{{ route('kode_arsip.index') }}" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15 text-white hover:bg-white/25 transition">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-bold text-white">Edit Lokasi Arsip</h1>
                        <p class="text-sky-200 text-sm">Ubah lokasi fisik penyimpanan dokumen: <strong>{{ $arsip->nama }}</strong></p>
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
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-[#12284B]">Form Lokasi Dokumen</h3>
                            <p class="text-xs text-slate-500">Lengkapi informasi letak fisik dokumen</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                            <ul class="list-disc pl-5 space-y-1">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('kode_arsip.update', $arsip->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- No PK --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">No PK</label>
                                <input type="text" name="no_pk" value="{{ old('no_pk', $arsip->no_pk) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm font-mono"
                                    placeholder="000 / 0000">
                            </div>

                            {{-- Departemen --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Departemen</label>
                                <input type="text" name="departemen" value="{{ old('departemen', $arsip->departemen) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                    placeholder="Nama Departemen">
                            </div>

                            {{-- PIC --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">PIC</label>
                                <input type="text" name="pic" value="{{ old('pic', $arsip->pic) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                    placeholder="Nama PIC">
                            </div>

                            {{-- Lokasi Arsip --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi (Arsip)</label>
                                <input type="text" name="lokasi_arsip" value="{{ old('lokasi_arsip', $arsip->lokasi_arsip) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                    placeholder="Contoh: Ruang Arsip 1">
                            </div>

                            {{-- No Rak --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">No Rak</label>
                                <input type="text" name="no_rak" value="{{ old('no_rak', $arsip->no_rak) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm font-mono"
                                    placeholder="Contoh: 00 | 00">
                            </div>

                            {{-- Baris Rak --}}
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Baris Rak</label>
                                <input type="text" name="baris_rak" value="{{ old('baris_rak', $arsip->baris_rak) }}"
                                    class="w-full rounded-xl border-slate-200 px-4 py-2.5 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm"
                                    placeholder="Contoh: Baris 1">
                            </div>

                            {{-- Keterangan --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan</label>
                                <textarea name="keterangan" rows="3"
                                    class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm" placeholder="Catatan tambahan...">{{ old('keterangan', $arsip->keterangan) }}</textarea>
                            </div>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="flex justify-end gap-3 pt-4 border-t border-slate-100 mt-6">
                            <a href="{{ route('kode_arsip.index') }}" class="rounded-xl bg-slate-100 px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-200 transition">Batal</a>
                            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] px-6 py-2.5 text-sm font-semibold text-white hover:shadow-lg transition-all shadow-sm">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
