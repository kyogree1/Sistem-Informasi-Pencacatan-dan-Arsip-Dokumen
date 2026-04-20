<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#0C2D57] leading-tight">Kelola Pegawai</h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-0" x-data="pegawaiPage()">
        <!-- HERO BANNER -->
        <div class="bg-gradient-to-r from-[#0C2D57] via-[#0f3a6e] to-[#0c4a8a] relative overflow-hidden">
            <div class="absolute inset-0"><svg class="absolute right-0 top-0 h-full w-1/3 opacity-5" viewBox="0 0 300 200" fill="none"><circle cx="200" cy="80" r="160" fill="white"/></svg></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        </span>
                        <div>
                            <h1 class="text-xl font-bold text-white">Kelola Akun Pegawai</h1>
                            <p class="text-sky-200 text-sm">Manajemen akun pegawai E-Arsip</p>
                        </div>
                    </div>
                    <span class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white">
                        <svg class="h-3.5 w-3.5 text-sky-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        {{ $totalPegawai }} Pegawai
                    </span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-5 relative z-20 pb-10 space-y-6">

            @if (session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800 flex items-center gap-2 shadow-sm">
                    <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800 shadow-sm">
                    <ul class="list-disc pl-5 space-y-1">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <!-- TOOLBAR CARD -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 p-5">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <form method="GET" action="{{ route('admin.pegawai.index') }}" class="flex gap-2 w-full sm:w-auto">
                        <div class="relative flex-1 sm:w-80">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau personal number..."
                                class="w-full rounded-xl border-slate-200 pl-10 pr-4 py-2.5 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500">
                        </div>
                        <button type="submit" class="rounded-xl bg-[#0C2D57] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#0f3a6e] transition shadow-sm">Cari</button>
                    </form>
                    <a href="{{ route('admin.pegawai.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#0C2D57] to-[#0c4a8a] px-5 py-2.5 text-sm font-semibold text-white hover:shadow-lg transition-all shadow-sm">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                        Tambah Pegawai
                    </a>
                </div>
            </div>

            <!-- TABLE -->
            <div class="rounded-2xl bg-white shadow-lg shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-slate-100/50">
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Personal Number</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3.5 text-left text-[11px] font-bold text-slate-500 uppercase tracking-wider">Password</th>
                                <th class="px-6 py-3.5 text-center text-[11px] font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse ($pegawai as $user)
                                <tr class="hover:bg-sky-50/50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-mono font-bold text-[#0C2D57] group-hover:bg-sky-100 group-hover:text-sky-700 transition">
                                            {{ $user->personal_number ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-blue-600 text-white text-xs font-bold shadow-md shadow-sky-500/20">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                            <div>
                                                <div class="text-sm font-semibold text-[#0C2D57]">{{ $user->name }}</div>
                                                <div class="text-xs text-slate-400">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap" x-data="{ show: false }">
                                        <!-- State: Hidden (default) -->
                                        <div x-show="!show" class="flex items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-slate-100 px-2.5 py-1.5 text-xs font-mono text-slate-500">
                                                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                                                ••••••••••
                                            </span>
                                            <button @click="show = true" type="button" class="inline-flex items-center gap-1 text-xs text-slate-400 hover:text-sky-600 transition p-1.5 rounded-lg hover:bg-sky-50" title="Lihat status">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            </button>
                                        </div>
                                        <!-- State: Shown -->
                                        <div x-show="show" x-transition class="flex items-center gap-2">
                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-amber-50 border border-amber-200 px-2.5 py-1.5 text-xs font-medium text-amber-700">
                                                <svg class="h-3.5 w-3.5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                                                Terenkripsi (Hash)
                                            </span>
                                            <button @click="show = false" type="button" class="inline-flex items-center gap-1 text-xs text-amber-500 hover:text-sky-600 transition p-1.5 rounded-lg hover:bg-sky-50" title="Sembunyikan">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <button @click="openEdit({{ json_encode($user) }})" class="inline-flex items-center gap-1 rounded-lg bg-amber-50 border border-amber-200 px-3 py-1.5 text-xs font-semibold text-amber-700 hover:bg-amber-100 transition">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/></svg>
                                                Edit
                                            </button>
                                            <button @click="confirmDelete({{ $user->id }}, '{{ $user->name }}')" class="inline-flex items-center gap-1 rounded-lg bg-red-50 border border-red-200 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-100 transition">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <svg class="mx-auto h-10 w-10 text-slate-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                                        <p class="text-sm text-slate-400">Belum ada data pegawai.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="border-t border-slate-100 px-6 py-4">{{ $pegawai->withQueryString()->links() }}</div>
            </div>
        </div>

        <!-- MODAL EDIT -->
        <div x-show="showEdit" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" @click.self="showEdit = false">
            <div x-show="showEdit" x-transition class="w-full max-w-lg mx-4 rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#0C2D57] to-[#0c4a8a] px-6 py-4 flex items-center justify-between">
                    <h3 class="text-base font-bold text-white">Edit Akun Pegawai</h3>
                    <button @click="showEdit = false" class="text-white/60 hover:text-white"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg></button>
                </div>
                <form :action="editAction" method="POST" class="p-6 space-y-4">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" x-model="editData.name" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Personal Number</label>
                            <input type="text" name="personal_number" x-model="editData.personal_number" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                            <input type="email" name="email" x-model="editData.email" required class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Password Baru <span class="text-slate-400 font-normal">(opsional)</span></label>
                            <input type="password" name="password" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full rounded-xl border-slate-200 shadow-sm focus:border-sky-500 focus:ring-sky-500 text-sm">
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 pt-3 border-t border-slate-100">
                        <button type="button" @click="showEdit = false" class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200 transition">Batal</button>
                        <button type="submit" class="rounded-xl bg-[#0C2D57] px-5 py-2 text-sm font-semibold text-white hover:bg-[#0f3a6e] transition shadow-sm">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>

        <form id="delete-form" method="POST" class="hidden">@csrf @method('DELETE')</form>
    </div>

    <script>
        function pegawaiPage() {
            return {
                showEdit: false,
                editData: { name: '', personal_number: '', email: '' },
                editAction: '',
                openEdit(user) {
                    this.editData = { name: user.name, personal_number: user.personal_number || '', email: user.email };
                    this.editAction = `/kelola/pegawai/${user.id}`;
                    this.showEdit = true;
                },
                confirmDelete(id, name) {
                    Swal.fire({
                        title: 'Hapus Akun?',
                        html: `Akun pegawai <b>${name}</b> akan dihapus secara permanen.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.getElementById('delete-form');
                            form.action = `/kelola/pegawai/${id}`;
                            form.submit();
                        }
                    });
                }
            }
        }
    </script>
</x-app-layout>
