<x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] relative overflow-hidden">
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
            <div class="rounded-2xl bg-white dark:bg-slate-900 shadow-lg shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 p-5 mb-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <form method="GET" class="flex gap-2 w-full sm:w-auto">
                        <div class="relative flex-1 sm:w-80">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Debitur / No PK..."
                                class="input-field pl-10 pr-4">
                        </div>
                        <button type="submit" class="btn btn-primary px-5 py-2.5">
                            <svg class="h-4 w-4 inline mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            Filter
                        </button>
                    </form>

                    <a href="{{ route('archive.create') }}" class="btn bg-gradient-to-r from-[#0055A0] to-[#12284B] text-white px-5 py-2.5 font-bold shadow-sm shadow-[#0055A0]/20 hover:-translate-y-0.5">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        Tambah Arsip
                    </a>
                </div>
            </div>

            <!-- TABLE -->
            <div class="rounded-2xl bg-white dark:bg-slate-900 shadow-lg shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table-base">
                        <thead class="table-head border-b border-[#8CC1E9] dark:border-slate-700 whitespace-nowrap">
                            <tr>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">CIF</th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Nama Debitur</th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">No. Rekening</th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Plafon</th>
                                <th class="px-6 py-4 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Status</th>
                                <th class="px-6 py-4 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Berkas</th>
                                <th class="px-6 py-4 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">PIC</th>
                                <th class="px-6 py-4 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-slate-800">
                            @forelse ($arsip as $item)
                                <tr class="table-row group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center rounded-lg bg-slate-100 dark:bg-slate-800 px-2.5 py-1 text-xs font-mono font-bold text-slate-600 dark:text-slate-300">{{ $item->cif }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-500 group-hover:bg-blue-100 transition shrink-0">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                            </span>
                                            <span class="text-sm font-semibold text-[#12284B] dark:text-slate-100">{{ $item->nama }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-semibold text-slate-600 dark:text-slate-300">{{ $item->nomor_rekening }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-bold text-[#12284B] dark:text-slate-100">Rp. {{ number_format($item->plafon, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if($item->status == 'Lunas')
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 dark:bg-emerald-500/10 px-3 py-1 text-xs font-bold text-emerald-600 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-700/60">Lunas</span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 dark:bg-red-500/10 px-3 py-1 text-xs font-bold text-red-600 dark:text-red-300 border border-red-200 dark:border-red-700/60">Belum Lunas</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @if($item->berkas)
                                            <a href="{{ asset('storage/' . $item->berkas) }}" target="_blank" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition" title="Download Berkas">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1 rounded-lg bg-slate-100 dark:bg-slate-800 px-2.5 py-1 text-xs font-semibold text-slate-600 dark:text-slate-300">{{ $item->pic ?? '-' }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('archive.edit', $item->id) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit Data">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                                            </a>
                                            <button type="button" onclick="confirmDelete({{ $item->id }}, '{{ addslashes($item->nama) }}')" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus Data">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-14 text-center whitespace-nowrap">
                                        <svg class="mx-auto h-10 w-10 text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                                        <p class="text-sm text-slate-400">Tidak ada data arsip.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="border-t border-slate-100 dark:border-slate-800 px-6 py-4">{{ $arsip->withQueryString()->links() }}</div>
            </div>
        </div>

        <form id="delete-form" method="POST" class="hidden">@csrf @method('DELETE')</form>
    </div>

    <script>
        function showDetail(nama, keterangan, tanggal, pic) {
            Swal.fire({
                title: '',
                html: `
                    <div class="text-left">
                        <div class="flex items-center gap-3 mb-5">
                            <span style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:12px;background:linear-gradient(135deg,#12284B,#0c4a8a);color:white;font-size:14px;font-weight:700;">${nama.charAt(0)}</span>
                            <div>
                                <p style="font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;">Debitur</p>
                                <p style="font-size:16px;font-weight:700;color:#12284B;">${nama}</p>
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
                confirmButtonColor: '#12284B',
                customClass: { popup: 'rounded-2xl' }
            });
        }

        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Hapus Arsip?',
                html: `Arsip dokumen debitur <b>${name}</b> akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form');
                    form.action = `/archive/${id}`;
                    form.submit();
                }
            });
        }
    </script>
</x-app-layout>
