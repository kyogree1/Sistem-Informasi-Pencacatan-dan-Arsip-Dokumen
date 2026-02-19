<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Arsip Dokumen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-400 text-red-700">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('archive.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Debitur --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Nama Debitur</label>
                            <input type="text" name="nama_debitur" value="{{ old('nama_debitur') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        {{-- No PK --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No PK</label>
                            <input type="text" name="no_pk" value="{{ old('no_pk') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        {{-- Nilai Kredit (Baru) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai Kredit</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">Rp</span>
                                </div>
                                <input type="number" name="nilai_kredit" value="{{ old('nilai_kredit') }}" step="0.01" required
                                    class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="0">
                            </div>
                        </div>

                        {{-- Divisi Dokumen --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Divisi Dokumen</label>
                            <input type="text" name="dokumen_divisi" value="{{ old('dokumen_divisi') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        {{-- Jumlah Bantex (Baru) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Bantex</label>
                            <input type="number" name="jumlah_bantex" value="{{ old('jumlah_bantex') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="0">
                        </div>

                        {{-- Lokasi Dokumen --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lokasi Dokumen</label>
                            <input type="text" name="lokasi_dokumen" value="{{ old('lokasi_dokumen') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Contoh: Rak A-1">
                        </div>

                        {{-- PIC --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">PIC</label>
                            <input type="text" name="pic" value="{{ old('pic') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    {{-- Keterangan (Baru) --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="keterangan" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('keterangan') }}</textarea>
                    </div>

                    {{-- ACTION BUTTON --}}
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('archive.index') }}"
                            class="rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300">
                            Batal
                        </a>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 shadow-sm">
                            Simpan Arsip
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
