<?php

namespace App\Http\Controllers;

use App\Models\User; // <--- ini penting!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ImageHelper;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('updated_at', 'desc')->get();
        return view('backend.v_user.index', [
            'judul' => 'Data User',
            'index' => $user,
        ]);
    }

    public function create()
    {
        return view('backend.v_user.create', [ 
            'judul' => 'Tambah User', ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'      => 'required|max:255',
            'email'     => 'required|max:255|email|unique:user',
            'role'      => 'required',
            'hp'        => 'required|min:10|max:13',
            'password'  => 'required|min:4|confirmed',
            'foto'      => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ], $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max'   => 'Ukuran file gambar Maksimal adalah 1024 KB.'
        ]);
        
        $validatedData['status'] = 0;
        
        // menggunakan ImageHelper
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory = 'storage/img-user/';
        
            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400); // null jika tinggi otomatis
            $validatedData['foto'] = $originalFileName; // Simpan nama file asli di database
        }
        
        // password kombinasi
        $password = $request->input('password');
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'; // kombinasi huruf kecil, besar, angka, dan simbol
        
        if (preg_match($pattern, $password)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData, $messages);
        
            return redirect()->route('backend.user.index')->with('success', 'Data berhasil tersimpan');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Password harus terdiri dari kombinasi huruf besar, huruf kecil, angka, dan simbol karakter.'
            ]);
        }
        
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.v_user.edit', [
        'judul' => 'Ubah User',
        'edit' => $user
        ]);
    }

    public function update(Request $request, string $id)
    {
        // ddd($request);
        $user = User::findOrFail($id);

        $rules = [
            'nama'   => 'required|max:255',
            'role'   => 'required',
            'status' => 'required',
            'hp'     => 'required|min:10|max:13',
            'foto'   => 'image|mimes:jpeg,jpg,png,gif|file|max:1024',
        ];

        $messages = [
            'foto.image' => 'Format gambar gunakan file dengan ekstensi jpeg, jpg, png, atau gif.',
            'foto.max'   => 'Ukuran file gambar Maksimal adalah 1024 KB.',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|max:255|email|unique:user';
        }

        $validatedData = $request->validate($rules, $messages);

        // menggunakan ImageHelper
        if ($request->file('foto')) {
            // hapus gambar lama
            if ($user->foto) {
                $oldImagePath = public_path('storage/img-user/') . $user->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file            = $request->file('foto');
            $extension       = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
            $directory       = 'storage/img-user/';

            // Simpan gambar dengan ukuran yang ditentukan
            ImageHelper::uploadAndResize($file, $directory, $originalFileName, 385, 400); // null (jika tinggi otomatis)

            // Simpan nama file asli di database
            $validatedData['foto'] = $originalFileName;
        }

        $user->update($validatedData);

        return redirect()
            ->route('backend.user.index')
            ->with('success', 'Data berhasil diperbaharui');

    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Hapus file foto jika ada
        if ($user->foto) {
            $oldImagePath = public_path('storage/img-user/') . $user->foto;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    
        // Hapus data user dari database
        $user->delete();
    
        return redirect()->route('backend.user.index')->with('success', 'Data berhasil dihapus');
    }

    public function formUser()
    {
        return view('backend.v_user.form', [
        'judul' => 'Laporan Data User',
        ]);
    }


    public function cetakUser(Request $request)
    {
    // Menambahkan aturan validasi
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ], [
            'tanggal_awal.required' => 'Tanggal Awal harus diisi.',
            'tanggal_akhir.required' => 'Tanggal Akhir harus diisi.',
            'tanggal_akhir.after_or_equal' => 'Tanggal Akhir harus lebih besar atau sama
            dengan Tanggal Awal.',
        ]);
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        $query = User::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]) ->orderBy('id', 'desc');
        $user = $query->get();
        return view('backend.v_user.cetak', [
            'judul' => 'Laporan User',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'cetak' => $user
        ]);
    }
    
}
