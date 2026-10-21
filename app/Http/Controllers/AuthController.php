<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Memproses registrasi pengguna baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],

            'nama' => [
                'nullable',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:100',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'nama' => $validated['nama'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'pengguna',
            'status' => 'aktif',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('success', 'Registrasi berhasil. Selamat datang di TETENGER!');
    }

    /**
     * Menampilkan halaman login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     */
    
/**
 * Memproses login pengguna.
 */
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
    ]);

    // Memeriksa email dan password.
    if (!Auth::attempt($credentials)) {
        return back()
            ->withErrors([
                'email' => 'Email atau password yang kamu masukkan salah.',
            ])
            ->onlyInput('email');
    }

    // Memperbarui session setelah login berhasil.
    $request->session()->regenerate();

    $user = Auth::user();

    // Memeriksa status akun.
    if ($user->status !== 'aktif') {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()
            ->withErrors([
                'email' => 'Akun tidak aktif. Silakan hubungi administrator.',
            ])
            ->onlyInput('email');
    }

    // Mengarahkan pengguna sesuai role.
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')
            ->with('success', 'Login admin berhasil.');
    }

    if ($user->role === 'pengguna') {
        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil. Selamat datang kembali!');
    }

    // Menangani role yang tidak dikenali.
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return back()
        ->withErrors([
            'email' => 'Role akun tidak dikenali. Silakan hubungi administrator.',
        ])
        ->onlyInput('email');
}


    /**
     * Memproses logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}