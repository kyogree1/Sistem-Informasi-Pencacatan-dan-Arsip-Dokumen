<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kontak & Bantuan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">
                    Kontak & Bantuan
                </h1>
                <p class="mt-1 text-gray-600">
                    Hubungi kami jika Anda membutuhkan bantuan terkait sistem arsip.
                </p>
            </div>

            {{-- INFO KONTAK --}}
            <div class="mb-10 grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="rounded-lg bg-white p-6 shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        📞 Kontak Admin
                    </h3>
                    <p class="text-sm text-gray-600">
                        Email:
                        <span class="font-medium text-gray-900">
                            admin@arsip.test
                        </span>
                    </p>
                    <p class="text-sm text-gray-600 mt-1">
                        Telepon:
                        <span class="font-medium text-gray-900">
                            (0542) 123456
                        </span>
                    </p>
                </div>

                <div class="rounded-lg bg-white p-6 shadow">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        🕒 Jam Operasional
                    </h3>
                    <p class="text-sm text-gray-600">
                        Senin – Jumat
                    </p>
                    <p class="text-sm text-gray-600">
                        08.00 – 16.00 WITA
                    </p>
                </div>
            </div>

            {{-- FORM BANTUAN --}}
            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    📝 Form Permintaan Bantuan
                </h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Nama
                        </label>
                        <input
                            type="text"
                            value="{{ auth()->user()->name }}"
                            disabled
                            class="mt-1 w-full rounded-md border-gray-300 bg-gray-100 shadow-sm"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input
                            type="email"
                            value="{{ auth()->user()->email }}"
                            disabled
                            class="mt-1 w-full rounded-md border-gray-300 bg-gray-100 shadow-sm"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Pesan
                        </label>
                        <textarea
                            rows="4"
                            placeholder="Tuliskan kendala atau pertanyaan Anda..."
                            class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        ></textarea>
                    </div>

                    <div class="pt-2">
                        <button
                            type="button"
                            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                            Kirim Pesan
                        </button>
                    </div>
                </form>

                <p class="mt-4 text-xs text-gray-500">
                    *Form ini bersifat informatif (belum tersambung ke email).
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
