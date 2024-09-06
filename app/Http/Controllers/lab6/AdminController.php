<?php

namespace App\Http\Controllers\lab6;

use App\Http\Controllers\Controller;
use App\Models\Asm\Clothes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function account()
    {
        return view('asm.admin.account');
    }

    public function listUser(User $user)
    {
        // $users = User::where('id', '!=', $user->id)->paginate(5);
        $users = User::where('id', '!=', $user->id)
            ->where('role', 'user')
            ->paginate(5);

        return view('asm.admin.list', compact('users'));
    }

    public function onAccount(User $user)
    {
        $user['active'] = true;
        $user->update();
        return redirect()->back()->with('userOnAccount', "Hoạt động tài khoản $user->fullName");
    }
    public function offAccount(User $user)
    {
        $user['active'] = false;
        $user->update();
        return redirect()->back()->with('userOfAccount', "Ngừng hoạt động tài khoản $user->fullName");
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->back()->with('deleteuserseccess', 'Xóa thành công tài khoản');
    }
    public function formRegister()
    {
        return view('asm.admin.register');
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
        $data['password'] = Hash::make($request->input('password'));
        // Thêm dữ liệu vào database
        User::create($data);
        return redirect()->route('admin.formLogin')->with('registerSuccess', 'Đăng ký thành công!');
    }
    public function formLogin()
    {
        return view('asm.admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Lấy dữ liệu đăng nhập
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->active == 1) {
                return redirect()->route('admin.categories')->with('loginSuccess', 'Đăng nhập thành công!');
            } else {
                Auth::logout(); // Đăng xuất nếu đã đăng nhập
                return redirect()->route('admin.formLogin')->with('loginError', 'Tài khoản của bạn đã bị vô hiệu hóa!');
            }
        }
        return redirect()->route('admin.formLogin')->with('loginError', 'Tài khoản hoặc mật khẩu không đúng!');
    }


    public function logout()
    {
        Auth::logout();
        return view('asm.admin.login')->with('logoutSuccess', 'Đăng xuất thành công!');
    }

    public function update(User $user, Request $request)
    {
        $data = $request->except('avatar', 'password');
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $old_avatar = $user['avatar'];
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('image');
            $data['avatar'] = $avatar_path;
        }

        $user->update($data);
        if (isset($avatar_path)) {
            if (file_exists('image/' . $old_avatar)) {
                unlink('image/' . $old_avatar);
            }
        }
        return redirect()->route('admin.account')->with('updateSuccess', 'Cập nhật thành công!');
    }

    public function formUpdatePassword(User $user)
    {
        return view('asm.admin.accountUpdatePass', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'passNew' => 'required|min:3|max:50',
            'passNewAgain' => 'required|min:3|max:50',
        ]);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($request['password'] === $request['passNew']) {
                return redirect()->back()->with('passNewError', 'Mật khẩu mới không được giống mật khẩu cũ');
            }
            if ($request['passNew'] !== $request['passNewAgain']) {
                return redirect()->back()->with('passAgainError', 'Nhập lại mật khẩu mới');
            } else {
                $user->password = Hash::make($request['passNew']);
                $user->save();
                return redirect()->back()->with('passUpdateSuccess', 'Cập nhật mật khẩu thành công!');
            }
        } else {
            return redirect()->back()->with('passError', 'Sai mật khẩu');
        }
    }

    public function thongke()
    {
        $users = User::query()->where('role', '=', 'user')->count();
        $sold = Clothes::query()->sum('sold');
        $doanhthu = Clothes::select(DB::raw('SUM(price_new * sold) AS total_revenue'))
            ->value('total_revenue');
        return view('asm.admin.thongke', compact('users', 'sold', 'doanhthu'));
    }
}
