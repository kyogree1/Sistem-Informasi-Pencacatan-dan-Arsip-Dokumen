<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
// ===== INDEX — Daftar Semua Pegawai & Admin =====
    public function index(Request $request)
    {
        $search = $request->search;

        // 1. HAPUS baris ->where('role', 'pegawai') di sini agar semua tampil
        $pegawai = DB::table('users')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('personal_number', 'like', '%' . $search . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate(10);

        // 2. HAPUS juga filter ->where('role', 'pegawai') pada perhitungan total ini
        $totalPegawai = DB::table('users')->count();

        return view('admin.pegawai.index', compact('pegawai', 'totalPegawai'));
    }

    // ===== CREATE — Form Tambah Pegawai =====
    public function create()
    {
        return view('admin.pegawai.create');
    }

    // ===== STORE — Simpan Akun Pegawai Baru =====
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'personal_number' => 'required|string|max:50|unique:users,personal_number',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|string|min:6|confirmed',
            'departemen'      => 'required|string|max:255',
            'divisi'          => 'required|string|max:255',
            // Opsional: tambahkan validasi role jika ada di form create
            'role'            => 'nullable|in:admin,pegawai',
        ], [
            'name.required'            => 'Nama wajib diisi.',
            'personal_number.required' => 'Personal Number wajib diisi.',
            'personal_number.unique'   => 'Personal Number sudah digunakan.',
            'email.required'           => 'Email wajib diisi.',
            'email.unique'             => 'Email sudah digunakan.',
            'password.required'        => 'Password wajib diisi.',
            'password.min'             => 'Password minimal 6 karakter.',
            'password.confirmed'       => 'Konfirmasi password tidak cocok.',
            'departemen.required'      => 'Departemen wajib diisi.',
            'divisi.required'          => 'Divisi wajib diisi.',
        ]);

        DB::table('users')->insert([
            'name'            => $request->name,
            'personal_number' => $request->personal_number,
            'email'           => $request->email,
            'departemen'      => $request->departemen,
            'divisi'          => $request->divisi,
            'password'        => Hash::make($request->password),
            // Gunakan request role jika ada, jika tidak default ke 'pegawai'
            'role'            => $request->role ?? 'pegawai',
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Akun pegawai berhasil ditambahkan.');
    }

    // ===== UPDATE — Edit Akun Pegawai =====
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'personal_number' => 'required|string|max:50|unique:users,personal_number,' . $id,
            'email'           => 'required|email|unique:users,email,' . $id,
            'password'        => 'nullable|string|min:6|confirmed',
            'departemen'      => 'required|string|max:255',
            'divisi'          => 'required|string|max:255',
            // PENAMBAHAN: Validasi role
            'role'            => 'required|string|in:admin,pegawai',
        ], [
            'name.required'            => 'Nama wajib diisi.',
            'personal_number.required' => 'Personal Number wajib diisi.',
            'personal_number.unique'   => 'Personal Number sudah digunakan.',
            'email.unique'             => 'Email sudah digunakan.',
            'password.min'             => 'Password minimal 6 karakter.',
            'password.confirmed'       => 'Konfirmasi password tidak cocok.',
            'departemen.required'      => 'Departemen wajib diisi.',
            'divisi.required'          => 'Divisi wajib diisi.',
            // PENAMBAHAN: Pesan error kustom untuk role
            'role.required'            => 'Role wajib dipilih.',
            'role.in'                  => 'Role yang dipilih tidak valid.',
        ]);

        $data = [
            'name'            => $request->name,
            'personal_number' => $request->personal_number,
            'email'           => $request->email,
            'departemen'      => $request->departemen,
            'divisi'          => $request->divisi,
            // PENAMBAHAN: Masukkan data role ke array pembaruan
            'role'            => $request->role,
            'updated_at'      => now(),
        ];

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Akun pegawai berhasil diperbarui.');
    }

    // ===== DESTROY — Hapus Akun Pegawai =====
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.pegawai.index')
            ->with('success', 'Akun pegawai berhasil dihapus.');
    }
}
