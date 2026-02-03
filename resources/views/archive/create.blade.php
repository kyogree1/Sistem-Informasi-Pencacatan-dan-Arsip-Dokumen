<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Arsip Dokumen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('archive.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Nama Debitur --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nama Debitur
                        </label>
                        <input
                            type="text"
                            name="nama_debitur"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- No PK --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            No PK
                        </label>
                        <input
                            type="text"
                            name="no_pk"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Divisi Dokumen --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Divisi Dokumen
                        </label>
                        <input
                            type="text"
                            name="dokumen_divisi"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                        <p class="mt-1 text-xs text-gray-500">
                            Opsional, isi jika dokumen terkait divisi tertentu
                        </p>
                    </div>

                    {{-- Lokasi Dokumen --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Lokasi Dokumen
                        </label>
                        <input
                            type="text"
                            name="lokasi_dokumen"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- PIC --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            PIC
                        </label>
                        <input
                            type="text"
                            name="pic"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- ACTION BUTTON --}}
                    <div class="flex justify-end gap-3 pt-4">
                        <a
                            href="{{ route('archive.index') }}"
                            class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500"
                        > 
                            Simpan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
