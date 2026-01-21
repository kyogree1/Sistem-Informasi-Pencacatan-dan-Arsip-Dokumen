<x-layout>
    <div x-data="{ showGuide: false }">

        {{-- GREETING --}}
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">
                Halo, {{ auth()->user()->name }} 👋
            </h1>
            <p class="text-gray-600">
                Selamat datang di Sistem Informasi Pencatatan dan Arsip Dokumen
            </p>
        </div>

        {{-- SUMMARY CARDS --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-10">
            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Total Arsip</p>
                <p class="mt-1 text-2xl font-semibold text-gray-900">124</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Dokumen Bulan Ini</p>
                <p class="mt-1 text-2xl font-semibold text-gray-900">18</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Departemen</p>
                <p class="mt-1 text-2xl font-semibold text-gray-900">6</p>
            </div>

            <div class="rounded-lg bg-white p-5 shadow">
                <p class="text-sm text-gray-500">Akun Aktif Sejak</p>
                <p class="mt-1 text-sm font-medium text-gray-900">
                    {{ auth()->user()->created_at->format('d M Y') }}
                </p>
            </div>
        </div>

        {{-- QUICK ACTIONS --}}
        <div class="mb-6">
            <h2 class="mb-4 text-lg font-semibold text-gray-900">
                Aksi Cepat
            </h2>

            <button
                @click="showGuide = !showGuide"
                class="inline-flex items-center rounded-md bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-200">
                ℹ️ Panduan Penggunaan
            </button>
        </div>

        {{-- GUIDE PANEL --}}
        <div
            x-show="showGuide"
            x-transition
            class="mb-10 rounded-lg border border-indigo-200 bg-indigo-50 p-6"
        >
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-indigo-900">
                    📘 Panduan Penggunaan Sistem
                </h3>
                <button
                    @click="showGuide = false"
                    class="text-sm text-indigo-700 hover:underline">
                    Tutup
                </button>
            </div>

            <ol class="list-decimal ml-5 space-y-2 text-indigo-900 text-sm">
                <li>Login melalui halaman utama sistem.</li>
                <li>Masuk ke Dashboard.</li>
                <li>Buka menu <b>Archive</b> untuk melihat dokumen.</li>
                <li>Gunakan pencarian untuk menemukan dokumen.</li>
                <li>Unduh dokumen sesuai kebutuhan.</li>
                <li>Hubungi Admin jika terdapat kesalahan data.</li>
            </ol>

            <p class="mt-4 text-xs text-indigo-800">
                ⚠️ Dokumen bersifat internal dan hanya digunakan untuk kepentingan resmi.
            </p>
        </div>

        {{-- RECENT DOCUMENTS --}}
        <div class="mb-10">
            <h2 class="mb-4 text-lg font-semibold text-gray-900">
                Arsip Terbaru
            </h2>

            <div class="overflow-hidden rounded-lg bg-white shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Nama Dokumen
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Departemen
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Tanggal
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Surat Keputusan 01</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Umum</td>
                            <td class="px-6 py-4 text-sm text-gray-500">12 Jan 2026</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Laporan Keuangan</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Keuangan</td>
                            <td class="px-6 py-4 text-sm text-gray-500">10 Jan 2026</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">Notulen Rapat</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Sekretariat</td>
                            <td class="px-6 py-4 text-sm text-gray-500">8 Jan 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <a href="/archive" class="text-sm font-medium text-indigo-600 hover:underline">
                    Lihat semua arsip →
                </a>
            </div>
        </div>

        {{-- SYSTEM INFO --}}
        <div class="rounded-lg bg-yellow-50 p-5">
            <p class="text-sm text-yellow-800">
                ⚠️ Dokumen dalam sistem ini bersifat internal dan rahasia.
                Dilarang menyebarluaskan tanpa izin resmi.
            </p>
        </div>

    </div>
</x-layout>
