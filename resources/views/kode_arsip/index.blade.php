<x-app-layout>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center gap-3">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                    </span>
                    <div>
                        <h1 class="text-xl font-bold text-white">Kelola Kode Arsip</h1>
                        <p class="text-sky-200 text-sm">Lokasi fisik penyimpanan dokumen arsip</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8 -mt-5 relative z-20 pb-10">

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 flex items-center gap-2 shadow-sm">
                    <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- TOOLBAR CARD -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 p-5 mb-6">
                <form method="GET" action="{{ route('kode_arsip.index') }}" class="flex gap-2 w-full sm:w-1/2 md:w-1/3">
                    <div class="relative flex-1">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / No PK..."
                            class="w-full rounded-xl border-slate-200 pl-10 pr-4 py-2.5 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500">
                    </div>
                    <button type="submit" class="rounded-xl bg-[#12284B] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#0f3a6e] transition shadow-sm">Cari</button>
                </form>
            </div>

            <!-- TABLE -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 border-collapse">
                        <thead class="bg-[#8CC1E9] border-b border-[#8CC1E9] whitespace-nowrap">
                            <tr>
                                <th class="px-5 py-3.5 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Nama Debitur</th>
                                <th class="px-5 py-3.5 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Jumlah Bantex</th>
                                <th class="px-5 py-3.5 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">NO PK</th>
                                <th class="px-5 py-3.5 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Lokasi (Arsip)</th>
                                <th class="px-5 py-3.5 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">No Rak</th>
                                <th class="px-5 py-3.5 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Baris Rak</th>
                                <th class="px-5 py-3.5 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Departemen</th>
                                <th class="px-5 py-3.5 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">PIC</th>
                                <th class="px-5 py-3.5 text-center text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($paginatedDebiturs as $debitur)
                                @php
                                    $debiturDetails = $details->get($debitur->nama);
                                    $rowspan = $debiturDetails ? $debiturDetails->count() : 1;
                                @endphp

                                @if($debiturDetails && $rowspan > 0)
                                    @foreach($debiturDetails as $index => $item)
                                        <tr class="hover:bg-sky-50/30 transition-colors group">
                                            @if($index === 0)
                                                <td rowspan="{{ $rowspan }}" class="px-5 py-4 border-r border-slate-200 align-top bg-white whitespace-nowrap">
                                                    <div class="font-semibold text-[#12284B]">{{ $debitur->nama }}</div>
                                                </td>
                                                <td rowspan="{{ $rowspan }}" class="px-5 py-4 border-r border-slate-200 align-top bg-white text-center whitespace-nowrap">
                                                    <span class="inline-flex items-center rounded bg-slate-100 px-2 py-1 text-xs font-mono font-bold text-slate-600">
                                                        {{ $debitur->total_bantex }}
                                                    </span>
                                                </td>
                                            @endif

                                            <!-- Data Spesifik Per Arsip -->
                                            <td class="px-5 py-3 border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                <span class="inline-flex items-center rounded bg-slate-100 px-2 py-1 text-xs font-mono font-bold text-slate-600">{{ $item->no_pk ?? '-' }}</span>
                                            </td>
                                            <td class="px-5 py-3 text-sm font-medium text-slate-700 border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                {{ $item->lokasi_arsip ?? '-' }}
                                            </td>
                                            <td class="px-5 py-3 text-center border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                <span class="inline-flex items-center rounded bg-slate-100 px-2 py-1 text-xs font-mono font-bold text-slate-600">{{ $item->no_rak ?? '-' }}</span>
                                            </td>
                                            <td class="px-5 py-3 text-sm text-center text-slate-600 border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                {{ $item->baris_rak ?? '-' }}
                                            </td>
                                            <td class="px-5 py-3 text-sm font-semibold text-[#12284B] border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                {{ $item->departemen ?? '-' }}
                                            </td>
                                            <td class="px-5 py-3 text-sm text-slate-600 border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                {{ $item->pic ?? '-' }}
                                            </td>
                                            <td class="px-5 py-3 text-center border-b border-slate-100 {{ $index % 2 == 0 ? 'bg-slate-50/50' : 'bg-white' }} whitespace-nowrap">
                                                <div class="flex items-center justify-center gap-1.5" x-data="{ showInfo: false }">
                                                    <a href="{{ route('kode_arsip.edit', $item->id) }}" class="inline-flex h-7 w-7 items-center justify-center rounded bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Edit Lokasi">
                                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                                                    </a>
                                                    
                                                    <div class="relative">
                                                        <button @click="showInfo = !showInfo" @click.away="showInfo = false" class="inline-flex h-7 w-7 items-center justify-center rounded bg-slate-100 text-slate-500 hover:bg-slate-200 transition" title="Info Tambahan">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                                                        </button>
                                                        
                                                        <div x-show="showInfo" x-transition class="absolute right-0 top-full mt-1 w-64 p-3 bg-white rounded-xl shadow-xl border border-slate-100 z-50 text-left">
                                                            <h4 class="text-xs font-bold text-slate-800 mb-1 border-b border-slate-100 pb-1">Keterangan</h4>
                                                            <p class="text-xs text-slate-600 leading-relaxed">{{ $item->keterangan ?: 'Tidak ada keterangan.' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-14 text-center whitespace-nowrap">
                                        <svg class="mx-auto h-10 w-10 text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
                                        <p class="text-sm text-slate-400">Tidak ada data lokasi arsip.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="border-t border-slate-100 px-6 py-4">{{ $paginatedDebiturs->withQueryString()->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
