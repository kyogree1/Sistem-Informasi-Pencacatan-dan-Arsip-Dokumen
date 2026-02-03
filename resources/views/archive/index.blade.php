<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Arsip Dokumen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- PAGE TITLE --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900">
                    Arsip Dokumen
                </h1>
                <p class="text-gray-600">
                    Daftar arsip dokumen kredit
                </p>
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

                <button
                    type="submit"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                    Filter
                </button>
            </form>

            {{-- TABLE --}}

            <a href="{{ route('archive.create') }}"
            class="mb-4 inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
            + Tambah Arsip
            </a>

            <div class="overflow-hidden rounded-lg bg-white shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Nama Debitur
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                No PK
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Lokasi Dokumen
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                PIC
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($arsip as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $item->nama_debitur }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $item->no_pk }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $item->lokasi_dokumen }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $item->pic }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Tidak ada data arsip
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-6">
                {{ $arsip->withQueryString()->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
