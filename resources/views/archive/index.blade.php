<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0C2D57] leading-tight">Arsip Dokumen</h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#0C2D57] via-[#0f3a6e] to-[#0c4a8a] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/><circle cx="250" cy="150" r="120" fill="white" fill-opacity="0.5"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                        </span>
                        <div>
                            <h1 class="text-xl font-bold text-white">Arsip Dokumen Debitur</h1>
                            <p class="text-sky-200 text-sm">Daftar lengkap arsip dokumen kredit</p>
                        </div>
                    </div>
                    <span class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white">
                        <svg class="h-3.5 w-3.5 text-sky-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        {{ $arsip->total() }} Dokumen
                    </span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-5 relative z-20 pb-10">

            <!-- TOOLBAR CARD -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 p-5 mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <form method="GET" class="flex gap-2 w-full sm:w-auto">
                        <div class="relative flex-1 sm:w-80">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Debitur / No PK..."
                                class="w-full rounded-xl border-slate-200 pl-10 pr-4 py-2.5 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                        <button type="submit" class="rounded-xl bg-[#0C2D57] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#0f3a6e] transition shadow-sm">
                            <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            Filter
                        </button>
                    </form>

                    <a href="{{ route('archive.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#0C2D57] to-[#0c4a8a] px-5 py-2.5 text-sm font-semibold text-white hover:shadow-lg transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        Tambah Arsip
                    </a>
                </div>
            </div>

            <!-- TABLE -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-slate-100/50">
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Nama Debitur</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">No PK</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Nilai Kredit</th>
                                <th class="px-6 py-3.5 text-center text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bantex</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">PIC</th>
                                <th class="px-6 py-3.5 text-center text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($arsip as $item)
                                <tr class="hover:bg-sky-50/50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-500 group-hover:bg-blue-100 transition shrink-0">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                            </span>
                                            <span class="text-sm font-semibold text-[#0C2D57]">{{ $item->nama_debitur }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-mono font-bold text-slate-600">{{ $item->no_pk }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-bold text-emerald-700">Rp {{ number_format($item->nilai_kredit, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-sky-700">{{ $item->jumlah_bantex }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="block text-[10px] font-bold text-sky-600 bg-sky-50 rounded px-1.5 py-0.5 inline-block mb-0.5 uppercase">{{ $item->dokumen_divisi }}</span>
                                        <span class="block text-xs text-slate-500">{{ $item->lokasi_dokumen }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-br from-violet-500 to-violet-600 text-white text-[10px] font-bold">{{ strtoupper(substr($item->pic, 0, 1)) }}</span>
                                            <span class="text-sm text-slate-600">{{ $item->pic }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button type="button"
                                            onclick="showDetail('{{ $item->nama_debitur }}','{{ addslashes($item->keterangan ?? 'Tidak ada keterangan.') }}','{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}','{{ $item->pic }}')"
                                            class="inline-flex items-center gap-1 rounded-lg bg-sky-50 border border-sky-200 px-3 py-1.5 text-xs font-semibold text-sky-700 hover:bg-sky-100 transition">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-14 text-center">
                                        <svg class="mx-auto h-10 w-10 text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                        <p class="text-sm text-slate-400">Tidak ada data arsip.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="border-t border-slate-100 px-6 py-4">{{ $arsip->withQueryString()->links() }}</div>
            </div>
        </div>
    </div>

    <script>
        function showDetail(nama, keterangan, tanggal, pic) {
            Swal.fire({
                title: '',
                html: `
                    <div class="text-left">
                        <div class="flex items-center gap-3 mb-5">
                            <span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#0C2D57,#0c4a8a);color:white;font-size:14px;font-weight:700;">${nama.charAt(0)}</span>
                            <div>
                                <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;">Debitur</p>
                                <p style="font-size:16px;font-weight:700;color:#0C2D57;">${nama}</p>
                            </div>
                        </div>
                        <div style="padding:12px;background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;margin-bottom:16px;">
                            <p style="font-size:13px;color:#475569;font-style:italic;">"${keterangan}"</p>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;padding-top:12px;border-top:1px solid #e2e8f0;">
                            <div>
                                <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;">Ditambahkan</p>
                                <p style="font-size:13px;font-weight:600;color:#334155;">${tanggal}</p>
                            </div>
                            <div>
                                <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;">PIC</p>
                                <p style="font-size:13px;font-weight:600;color:#334155;">${pic}</p>
                            </div>
                        </div>
                    </div>
                `,
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#0C2D57',
                customClass: { popup: 'rounded-2xl' }
            });
        }
    </script>
</x-app-layout>
