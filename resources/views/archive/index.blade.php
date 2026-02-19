<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Arsip Dokumen
        </h2>
    </x-slot>

    {{-- CDN SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Arsip Dokumen</h1>
                <p class="text-gray-600">Daftar arsip dokumen kredit</p>
            </div>

            {{-- FILTER & SEARCH --}}
            <form method="GET" class="mb-6 flex flex-wrap gap-4">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari Nama Debitur / No PK"
                    class="w-full sm:w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                    Filter
                </button>
            </form>

            <a href="{{ route('archive.create') }}"
            class="mb-4 inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 shadow-sm">
            + Tambah Arsip
            </a>

            <div class="overflow-hidden rounded-lg bg-white shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Debitur</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No PK</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nilai Kredit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bantex</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">PIC</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">More</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($arsip as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $item->nama_debitur }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $item->no_pk }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">Rp {{ number_format($item->nilai_kredit, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $item->jumlah_bantex }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <span class="block text-[10px] font-bold text-indigo-600 uppercase">{{ $item->dokumen_divisi }}</span>
                                    {{ $item->lokasi_dokumen }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $item->pic }}</td>

                                <td class="px-6 py-4 text-sm text-center font-medium">
                                    <button
                                        type="button"
                                        onclick="showDetail(
                                            '{{ $item->nama_debitur }}',
                                            '{{ addslashes($item->keterangan ?? 'Tidak ada keterangan.') }}',
                                            '{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}',
                                            '{{ $item->pic }}'
                                        )"
                                        class="inline-flex items-center text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md transition"
                                    >
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 italic">Tidak ada data arsip.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $arsip->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <script>
        function showDetail(nama, keterangan, tanggal, pic) {
            Swal.fire({
                title: 'Detail Arsip',
                html: `
                    <div class="text-left bg-white p-2 text-sm">
                        <div class="mb-4">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Debitur</p>
                            <p class="text-gray-800 font-semibold text-base">${nama}</p>
                        </div>

                        <div class="mb-4 p-3 bg-gray-50 rounded border border-gray-100 italic text-gray-600">
                            "${keterangan}"
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-3 border-t border-gray-100">
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Ditambahkan Pada</p>
                                <p class="text-gray-700 font-medium">${tanggal}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Oleh (PIC)</p>
                                <p class="text-gray-700 font-medium">${pic}</p>
                            </div>
                        </div>
                    </div>
                `,
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#4f46e5',
            });
        }
    </script>
</x-app-layout>
