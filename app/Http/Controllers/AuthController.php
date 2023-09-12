<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\EditAuthRequest;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Http\Requests\Auth\ResetAuthRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class AuthController extends Controller
{
    public function loginView()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.view')->with('warning','You are already logged in.');
        }

        return view('auth.login');
    }

    public function login(LoginAuthRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.view')->with('success','Logged in successfully.');
        }

        return redirect()->back()->with('error','Incorrect credentials provided.');
    }

    public function registerView()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.view')->with('warning','You are already logged in.');
        }

        return view('auth.register');
    }

    public function register(RegisterAuthRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.view')->with('success','You have been registered successfully.');
        }

        return redirect()->back()->with('error','Registration failed.');
    }

    public function editView()
    {
        return view('auth.edit');
    }

    public function edit(EditAuthRequest $request)
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            if ($user->avatar) {
                Storage::delete('/public/avatars/' . $user->avatar);
            }
            $avatar->storeAs('public/avatars', $filename);
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route('auth.edit.view')->with('success','Profile updated successfully.');
    }

    public function resetView()
    {
        return view('auth.reset');
    }

    public function reset(ResetAuthRequest $request)
    {
        if (!Hash::check($request->get('old_password'), Auth::user()->getAuthPassword())) {
            return redirect()->back()->with('error','Old password is incorrect.');
        }

        $user = User::findOrFail(Auth::user()->getAuthIdentifier());
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('dashboard.view')->with('success','Password reset successfully.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login.view')->with('success','You have been logged out successfully.');
    }
}
