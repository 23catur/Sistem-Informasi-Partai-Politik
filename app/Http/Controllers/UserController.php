<?php

namespace App\Http\Controllers;

use App\Enums\UserLevel;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->search, fn ($q) => $q->search('name', $request->search)->search('username', $request->search, 'or')
            ->search('email', $request->search, 'or')
        )->paginate();

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.form', [
            'user' => new User(),
            'userLevels' => UserLevel::asSelectArray(),
        ]);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $picture = null;
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/picture', $filename);
            $picture = $filename;
        }

        User::create([
            'name' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['kata_sandi']),
            'level' => $data['level'],
            'picture_url' => $picture,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambah!');
    }

    public function edit(User $user)
    {
        return view('pages.users.form', [
            'user' => $user,
            'userLevels' => UserLevel::asSelectArray(),
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        $picture = null;

        if ($request->file('foto')) {
            if ($user->picture_url) {
                Storage::delete('public/picture/'.$user->picture_url);
            }
            $file = $request->file('foto');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/picture', $filename);
            $picture = $filename;
        }

        $user->update([
            'name' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'level' => $data['level'],
            'picture_url' => $picture,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }

    public function changePasswordPage()
    {
        return view('pages.users.change_password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (! Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Kata sandi Lama harus cocok dengan kata sandi saat ini.'])
                ->withInput();
        }

        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Kata sandi baru tidak boleh sama dengan kata sandi saat ini.'])
                ->withInput();
        }

        $user->password = bcrypt($request->password);
        $user->save();

        Auth::logout();

        return redirect()->route('auth.index');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);

        return view('pages.users.profile', compact('user'));
    }

    public function profileEdit()
    {
        $user = User::find(auth()->user()->id);

        return view('pages.users.profile-form', compact('user'));
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        if ($request->file('foto')) {
            if ($user->picture_url) {
                Storage::delete('public/picture/'.$user->picture_url);
            }
            $file = $request->file('foto');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/picture', $filename);
            $user->picture_url = $filename;
        }

        $user->name = $data['nama'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->route('users.profile.index')->with('success', 'Profile berhasil diubah!');
    }
}
