<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use Illuminate\Http\Response;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::latest()->paginate(10);
        return view('pages.admin.domain.index', ['domains' => $domains]);
    }

    public function create()
    {
        return view('pages.admin.domain.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'unique:domains,name',
                'max:255',
                'regex:/^([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/i'
            ], [
                'name.unique' => 'The domain has already been taken.',
                'name.regex' => 'The domain field must be a valid domain name.',
            ],
        ]);

        Domain::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin.domain.index')->with('success', 'Domain has been created successfully.');
    }

    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        return view('pages.admin.domain.edit', ['domain' => $domain]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'unique:domains,name,'.$id,
                'max:255',
                'regex:/^([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,}$/i'
            ], [
                'name.unique' => 'The domain has already been taken.',
                'name.regex' => 'The domain field must be a valid domain name.',
            ],
        ]);

        $domain = Domain::findOrFail($id);
        $domain->name = $request->input('name');
        $domain->save();
        

        return redirect()->route('admin.domain.index')->with('success', 'Domain has been updated successfully.');
    }

    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('admin.domain.index')->with('success', 'Domain has been deleted successfully.');
    }
}
