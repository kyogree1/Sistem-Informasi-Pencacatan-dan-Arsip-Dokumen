<x-app-layout>

    <div class="py-0">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#12284B] via-[#0055A0] to-[#438BC4] relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg class="absolute right-0 top-0 h-full w-1/2" viewBox="0 0 400 300" fill="none"><circle cx="300" cy="100" r="200" fill="white" fill-opacity="0.1"/><circle cx="350" cy="200" r="150" fill="white" fill-opacity="0.05"/></svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-1">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm text-lg">👋</span>
                            <h1 class="text-2xl font-bold text-white">Selamat Datang, {{ auth()->user()->name }}</h1>
                        </div>
                        <p class="text-sky-200 text-sm ml-[52px]">
                            @if(auth()->user()->departemen || auth()->user()->divisi)
                                <span class="font-semibold text-white">{{ auth()->user()->departemen ?? '-' }}</span> — <span class="text-sky-100">{{ auth()->user()->divisi ?? '-' }}</span>
                            @endif
                        </p>
                    </div>
                    <span class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/15 px-3 py-1.5 text-xs font-semibold text-emerald-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Sistem Online
                    </span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-6 relative z-20 pb-10" x-data="{ showGuide: false }">

            <!-- STAT CARDS — floating above banner -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                <!-- Total Arsip -->
                <div class="group rounded-2xl bg-white p-5 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:border-sky-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-[#DDA336] bg-amber-50 rounded-full px-2 py-0.5 uppercase border border-amber-200/50">Arsip</span>
                    </div>
                    <p class="text-3xl font-extrabold text-[#12284B]">{{ $totalArsip }}</p>
                    <p class="text-xs text-slate-500 mt-1 font-medium">Total Arsip Tersimpan</p>
                </div>

                <!-- Arsip Bulan Ini -->
                <div x-data="{ monthOpen: false, yearOpen: false }" class="relative group rounded-2xl bg-white p-5 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                    <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg shadow-emerald-500/30">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                        </span>

                        <div class="flex items-center gap-1.5">

                            <div class="relative">
                                <button @click="yearOpen = !yearOpen; monthOpen = false" @click.away="yearOpen = false" class="flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 bg-emerald-50 hover:bg-emerald-100 border border-emerald-100 rounded-full px-3 py-1.5 uppercase transition-all duration-200 cursor-pointer shadow-sm">
                                    @php $thn = request('tahun', date('Y')); @endphp
                                    <span>{{ $thn == 'semua' ? 'Semua Tahun' : $thn }}</span>
                                    <svg class="h-3 w-3 transition-transform duration-300" :class="yearOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                                </button>

                                <div x-show="yearOpen" x-transition class="absolute right-0 top-10 z-40 w-40 origin-top-right rounded-2xl bg-white/95 backdrop-blur-xl shadow-2xl ring-1 ring-slate-900/5 overflow-hidden focus:outline-none" style="display: none;">
                                    <div class="p-2 bg-slate-50/80 border-b border-slate-100">
                                        <a href="{{ request()->fullUrlWithQuery(['tahun' => null]) }}" class="block px-3 py-2 text-xs font-semibold rounded-lg transition-colors {{ $thn == date('Y') ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100' }}">Tahun Ini</a>
                                        <a href="{{ request()->fullUrlWithQuery(['tahun' => 'semua']) }}" class="block px-3 py-2 mt-1 text-xs font-semibold rounded-lg transition-colors {{ $thn == 'semua' ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100' }}">Semua Tahun</a>
                                    </div>
                                    <div class="p-2 grid grid-cols-2 gap-1">
                                        @foreach(range(date('Y') - 2, date('Y') + 2) as $y)
                                            <a href="{{ request()->fullUrlWithQuery(['tahun' => $y]) }}" class="text-center px-2 py-1.5 text-xs font-medium rounded-lg transition-all {{ $thn == $y ? 'bg-emerald-500 text-white font-bold' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-700' }}">
                                                {{ $y }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <button @click="monthOpen = !monthOpen; yearOpen = false" @click.away="monthOpen = false" class="flex items-center gap-1.5 text-[10px] font-bold text-emerald-600 bg-emerald-50 hover:bg-emerald-100 border border-emerald-100 rounded-full px-3 py-1.5 uppercase transition-all duration-200 cursor-pointer shadow-sm">
                                    @php
                                        $bln = request('bulan');
                                        $bulanNames = ['01'=>'Jan', '02'=>'Feb', '03'=>'Mar', '04'=>'Apr', '05'=>'Mei', '06'=>'Jun', '07'=>'Jul', '08'=>'Agt', '09'=>'Sep', '10'=>'Okt', '11'=>'Nov', '12'=>'Des'];
                                    @endphp
                                    <span>{{ $bln == 'semua' ? 'Semua Waktu' : ($bln ? $bulanNames[$bln] ?? 'Bulan Ini' : 'Bulan Ini') }}</span>
                                    <svg class="h-3 w-3 transition-transform duration-300" :class="monthOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                                </button>

                                <div x-show="monthOpen" x-transition class="absolute right-0 top-10 z-30 w-72 origin-top-right rounded-2xl bg-white/95 backdrop-blur-xl shadow-2xl ring-1 ring-slate-900/5 overflow-hidden focus:outline-none" style="display: none;">
                                    <div class="p-2 bg-slate-50/80 border-b border-slate-100">
                                        <a href="{{ request()->fullUrlWithQuery(['bulan' => null]) }}" class="block px-3 py-2 text-xs font-semibold rounded-lg transition-colors {{ !$bln ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100' }}">Bulan Ini</a>
                                        <a href="{{ request()->fullUrlWithQuery(['bulan' => 'semua']) }}" class="block px-3 py-2 mt-1 text-xs font-semibold rounded-lg transition-colors {{ $bln == 'semua' ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-100' }}">Semua Waktu</a>
                                    </div>
                                    <div class="p-3 grid grid-cols-3 gap-1.5">
                                        @foreach($bulanNames as $num => $name)
                                            <a href="{{ request()->fullUrlWithQuery(['bulan' => $num]) }}" class="text-center px-2 py-2 text-xs font-medium rounded-lg transition-all {{ $bln === (string)$num ? 'bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-md shadow-emerald-500/30 font-bold scale-105' : 'bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-700 hover:scale-105' }}">
                                                {{ $name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-3xl font-extrabold text-[#12284B] mt-2">{{ $arsipBulanIni }}</p>
                    <p class="text-[11px] text-slate-500 mt-1 font-medium leading-tight">
                        @php
                            $namaBulanSingkat = $bln && $bln != 'semua' ? (['01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', '05'=>'Mei', '06'=>'Juni', '07'=>'Juli', '08'=>'Agustus', '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember'][$bln] ?? '') : '';
                        @endphp
                        @if($bln == 'semua' && $thn == 'semua')
                            Total keseluruhan dokumen
                        @elseif($bln == 'semua')
                            Total dokumen tahun {{ $thn }}
                        @elseif($thn == 'semua')
                            Dokumen bulan {{ $namaBulanSingkat ?: 'ini' }} (Semua tahun)
                        @else
                            Dokumen ditambahkan bulan {{ $namaBulanSingkat ?: 'ini' }} {{ $thn == date('Y') && !$bln ? '' : $thn }}
                        @endif
                    </p>
                </div>

                <!-- Akun Aktif Sejak -->
                <div class="group rounded-2xl bg-white p-5 shadow-lg shadow-slate-200/50 border border-slate-100 hover:shadow-xl hover:border-violet-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 text-white shadow-lg shadow-violet-500/30">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <span class="text-[10px] font-bold text-violet-500 bg-violet-50 rounded-full px-2 py-0.5 uppercase">Aktif</span>
                    </div>
                    <p class="text-lg font-extrabold text-[#12284B]">{{ auth()->user()->created_at->format('d M Y') }}</p>
                    <p class="text-xs text-slate-500 mt-1 font-medium">Akun Terdaftar Sejak</p>
                </div>

                <!-- Quick Action (GOLD THEME) -->
                <a href="{{ route('archive.create') }}" class="group rounded-2xl bg-gradient-to-br from-[#DDA336] to-[#c58d24] p-5 shadow-lg shadow-amber-500/20 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 rounded-full bg-white/10"></div>
                    <div class="absolute -right-2 -top-2 w-16 h-16 rounded-full bg-white/10"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm text-[#12284B]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        </span>
                        <svg class="h-5 w-5 text-[#12284B]/60 group-hover:text-[#12284B] group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </div>
                    <p class="text-lg font-bold text-[#12284B] relative z-10">Input Arsip</p>
                    <p class="text-xs text-[#12284B]/80 mt-1 font-semibold relative z-10">Tambah dokumen baru</p>
                </a>
            </div>

            <!-- GUIDE -->
            <div class="mb-6">
                <button @click="showGuide = !showGuide"
                    class="inline-flex items-center gap-2 rounded-xl bg-white border border-slate-200 px-4 py-2.5 text-sm font-semibold text-[#12284B] hover:bg-slate-50 hover:border-sky-200 transition shadow-sm">
                    <svg class="h-4 w-4 text-sky-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
                    Panduan Penggunaan
                    <svg class="h-3.5 w-3.5 text-slate-400 transition-transform" :class="showGuide && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                </button>
            </div>

            <div x-show="showGuide" x-transition class="mb-8 rounded-2xl border border-sky-200 bg-gradient-to-r from-sky-50 to-blue-50 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-[#12284B] flex items-center gap-2">
                        <svg class="h-5 w-5 text-sky-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                        Panduan Penggunaan Sistem
                    </h3>
                    <button @click="showGuide = false" class="text-xs text-sky-600 hover:text-sky-800 font-semibold bg-white rounded-lg px-3 py-1 border border-sky-200 hover:bg-sky-50 transition">Tutup</button>
                </div>
                <ol class="list-decimal ml-5 space-y-2 text-[#12284B] text-sm">
                    <li>Login melalui halaman utama sistem.</li>
                    <li>Masuk ke Dashboard untuk melihat ringkasan data.</li>
                    <li>Buka menu <b>Arsip</b> untuk melihat dan mencari dokumen.</li>
                    <li>Gunakan fitur pencarian untuk menemukan dokumen spesifik.</li>
                    <li>Unduh dokumen sesuai kebutuhan.</li>
                    <li>Hubungi Admin jika terdapat kesalahan data.</li>
                </ol>
            </div>

            <!-- RECENT DOCUMENTS -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-sky-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <h2 class="text-lg font-bold text-[#12284B]">Arsip Terbaru</h2>
                    </div>
                    <a href="/archive" class="inline-flex items-center gap-1 text-sm font-semibold text-sky-600 hover:text-sky-700 bg-sky-50 px-3 py-1.5 rounded-lg border border-sky-100 hover:bg-sky-100 transition">
                        Lihat semua
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>

                <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-[#8CC1E9] border-b border-[#8CC1E9] whitespace-nowrap">
                            <tr>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Nama Dokumen</th>
                                <th class="px-6 py-4 text-left text-[11px] font-bold text-[#12284B] uppercase tracking-wider whitespace-nowrap">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($arsipTerbaru as $arsip)
                                <tr class="hover:bg-sky-50/50 transition-colors group">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-500 group-hover:bg-blue-100 transition">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                                            </span>
                                            <span class="text-sm font-semibold text-[#12284B]">{{ $arsip->nama }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                                            {{ \Carbon\Carbon::parse($arsip->created_at)->format('d M Y') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="2" class="px-6 py-14 text-center text-sm text-slate-400 whitespace-nowrap">Belum ada arsip terbaru</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- WARNING -->
            <div class="rounded-2xl bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 p-5 flex items-start gap-3">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-100 text-amber-600 shrink-0">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </span>
                <p class="text-sm text-amber-800"><strong>Perhatian:</strong> Dokumen dalam sistem ini bersifat internal dan rahasia. Dilarang menyebarluaskan tanpa izin resmi dari BPD Kaltim Kaltara.</p>
            </div>
        </div>
    </div>
</x-app-layout>
