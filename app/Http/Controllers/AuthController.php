<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login_register');
    }

    public function loginOrRegister(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            // Login dengan pengguna yang sudah terdaftar
            if (Auth::attempt($credentials)) {
                // Login sukses
                return redirect('/')->with('success', 'Login berhasil!');
            } else {
                // Login gagal
                return redirect()->back()->withInput()->withErrors(['password' => 'Kombinasi email dan password tidak valid.']);
            }
        } else {
            // Registrasi pengguna baru
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $credentials['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            // Login otomatis setelah registrasi
            Auth::login($user);

            // Redirect ke halaman utama setelah berhasil register
            return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
