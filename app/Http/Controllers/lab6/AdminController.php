<?php

namespace App\Http\Controllers\lab6;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function home()
    {
        return view('lab6.home');
    }

    public function listUser(User $user)
    {
        $users = User::where('id', '!=', $user->id)->paginate(5);
        return view('lab6.list', compact('users'));
    }

    public function onAccount(User $user)
    {
        $user['active'] = 1;
        $user->update();
        return redirect()->back()->with('userOnAccount', "Hoạt động tài khoản $user->fullName");
    }
    public function offAccount(User $user)
    {
        $user['active'] = 0;
        $user->update();
        return redirect()->back()->with('userOfAccount', "Ngừng hoạt động tài khoản $user->fullName");
    }
    public function formRegister()
    {
        return view('lab6.register');
    }

    public function register(Request $request)
    {
        $data = $request->except('avatar');
        $data = $request->validate([
            'fullname' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif|max:2048'],
        ]);
        // Upload hình ảnh
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('image');
            $data['avatar'] = $avatar_path;
        }
        // Thêm dữ liệu vào database
        User::create($data);
        return redirect()->route('lab6.formLogin')->with('registerSuccess', 'Đăng ký thành công!');
    }
    public function formLogin()
    {
        return view('lab6.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->active == 1) {
                return redirect()->route('lab6.home')->with('loginSuccess', 'Đăng nhập thành công!');
            } else {
                Auth::logout(); // Đăng xuất nếu đã đăng nhập
                return redirect()->route('lab6.formLogin')->with('loginError', 'Tài khoản của bạn đã bị vô hiệu hóa!');
            }
        }

        return redirect()->route('lab6.formLogin')->with('loginError', 'Tài khoản hoặc mật khẩu không đúng!');
    }


    public function logout()
    {
        Auth::logout();
        return view('lab6.login')->with('logoutSuccess', 'Đăng xuất thành công!');
    }

    public function update(User $user, Request $request)
    {
        $data = $request->except('avatar', 'password');
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'passwordN' => 'nullable|string|min:3|max:50|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $old_avatar = $user['avatar'];
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('image');
            $data['avatar'] = $avatar_path;
        }

        if ($request->filled('passwordN')) {
            $data['password'] = bcrypt($request->input('passwordN')); // Mã hóa mật khẩu
        }
        $user->update($data);
        if (isset($avatar_path)) {
            if (file_exists('image/' . $old_avatar)) {
                unlink('image/' . $old_avatar);
            }
        }
        if ($request->filled('passwordN')) {
            Auth::logout(); // Đăng xuất người dùng
            return redirect()->route('lab6.formLogin')->with('updateSuccess', 'Cập nhật thành công! Vui lòng đăng nhập lại.');
        }
        return redirect()->route('lab6.home')->with('updateSuccess', 'Cập nhật thành công!');
    }
}
