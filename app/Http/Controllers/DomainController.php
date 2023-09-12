<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Domain\FeedbackDomainRequest;
use App\Models\Blacklist;
use App\Models\Domain;
use App\Models\Feedback;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseStatus;

class DomainController extends Controller
{
    public function checkView()
    {
        return view('pages.domain.check');
    }

    public function check(Request $request): RedirectResponse
    {
        $domain = Domain::where('name', $request->get('name'))->first();
        $domainName = $request->get('name');

    // Save the value in the session
    $request->session()->put('domainName', $domainName);

        if (!$domain)
            return redirect()->route('domain.check.view')->with('error','Website not available.');

        $blacklist = Blacklist::where('user_id', Auth::user()->getAuthIdentifier())
            ->whereRelation('domain', 'name', $request->get('name'))
            ->first();

        if ($blacklist)
            return redirect()->route('domain.check.view')->with('error','Website is added to blacklist.');

        return redirect()->route('domain.check.view')->with('success','Website is available.');
    }

    public function blacklistView()
    {
        return view('pages.domain.blacklist');
    }

    public function blacklist(Request $request): RedirectResponse
    {
        $domain = Domain::where('name', $request->get('name'))->first();

        if (!$domain)
            return redirect()->route('domain.blacklist.view')->with('error','Website not available.');

        $blacklist = Blacklist::where('user_id', Auth::user()->getAuthIdentifier())
            ->whereRelation('domain', 'name', $request->get('name'))
            ->first();

        if ($blacklist)
            return redirect()->route('domain.blacklist.view')->with('error','Website is already added to blacklist.');

        $domain->blacklist()->create([
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);

        return redirect()->route('domain.blacklist.view')->with('success','Website is added to blacklist.');
    }

    public function feedbackView()
    {
        return view('pages.domain.feedback');
    }

    public function feedback(Request $request): RedirectResponse
    {
        $domain = Domain::where('name', $request->get('name'))->first();

        if (!$domain)
            return redirect()->route('domain.feedback.view')->with('error','Website not available.');

        $blacklist = Blacklist::where('user_id', Auth::user()->getAuthIdentifier())
            ->whereRelation('domain', 'name', $request->get('name'))
            ->first();

        if ($blacklist)
            return redirect()->route('domain.feedback.view')->with('error','Website has been blocked can not leave a feedback on this website.');

        $feedback = Feedback::where('user_id', Auth::user()->getAuthIdentifier())
            ->whereRelation('domain', 'name', $request->get('name'))
            ->first();

        if ($feedback)
            return redirect()->route('domain.feedback.view')->with('error','Already left a feedback on this website.');

        $domain->feedback()->create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'content' => $request->get('content')
        ]);

        return redirect()->route('domain.feedback.view')->with('success','Feedback has been added to website.');
    }
}
