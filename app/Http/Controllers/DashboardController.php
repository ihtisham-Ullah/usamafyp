<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Models\Blacklist;
use App\Models\Domain;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Login the resource.
     *
     */
    public function dashboardView()
    {
        if (auth()->user()->admin) {
            $data = [
                'domains' => Domain::count(),
            ];

            return view('pages.admin.dashboard', compact('data'));
        }
        $data = [
            'domains' => Domain::whereDoesntHave('blacklist', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->count(),
            'blacklists' => Blacklist::where('user_id', auth()->user()->id)->count(),
            'feedbacks' => Feedback::where('user_id', auth()->user()->id)->count(),
        ];

        return view('pages.dashboard', compact('data'));
    }

    /**
     * Login the resource.
     *
     * @param LoginAuthRequest $request
     * @return RedirectResponse
     */
    public function login(LoginAuthRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
        }

        return redirect()->back()->with('error', 'Incorrect credentials provided.');
    }
}
