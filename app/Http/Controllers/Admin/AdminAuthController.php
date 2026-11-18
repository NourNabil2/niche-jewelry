<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->boolean('remember', true);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'admin'], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))->with('success', 'مرحباً بك في لوحة تحكم دار نيش للمجوهرات.');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة أو ليس لديك صلاحية مدير.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'تم تسجيل الخروج بنجاح.');
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'تم تحديث بيانات الملف الشخصي وكلمة المرور بنجاح.');
    }
}
