<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | هذا الكنترولر مسؤول عن تسجيل الدخول لكل أنواع المستخدمين
    | (web, student, perent, teacher) و إعادة التوجيه بعد الدخول.
    |
    */

    use AuthenticatesUsers;

    /**
     * مكان إعادة التوجيه بعد تسجيل الدخول الافتراضي.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * إنشاء الكنترولر.
     */
    public function __construct()
    {
        // منع المستخدمين المسجلين من رؤية صفحة login
        $this->middleware('guest:web')->except('logout');
        $this->middleware('guest:student')->except('logout');
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:perent')->except('logout');
    }

    /**
     * عرض صفحة تسجيل الدخول حسب نوع المستخدم.
     */
    public function showLoginForm($type)
    {
        return view('auth.login', ['type' => $type]);
    }

    /**
     * تسجيل الدخول.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required',
        ]);

        $guard = $request->type; // web, student, perent, teacher
         if (Auth::guard($guard)->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // إعادة التوجيه للـ dashboard المناسب
            return redirect()->intended("/{$guard}/dashboard");
        }

        return back()->withErrors(['email' => 'بيانات الدخول غير صحيحة']);
    }

    /**
     * تسجيل الخروج من أي نوع مستخدم.
     */
    public function logout(Request $request)
    {
        $guards = ['web', 'student', 'teacher', 'perent'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
