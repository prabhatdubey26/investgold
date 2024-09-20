<?php

namespace App\Http\Controllers\Admin;
use App\Models\Header;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $Headers = Header::all();
        return view('admin.header.index', compact('Headers'));
    }

    public function create()
    {
        return view('admin.header.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'integer',
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string',
            ]);

        Header::create([
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'link' => $request->input('link')
        ]);

        return redirect()->route('admin.header.index')
                         ->with('success', 'Header created successfully.');
    }

    public function edit(Header $header)
    {
        return view('admin.header.edit', compact('header'));
    }

    public function update(Request $request, Header $header)
    {
        $request->validate([
            'type' => 'integer',
            'title' => 'required|string|max:255',
            'link' => 'nullable|string'
        ]);
    
        $data = $request->only('type','title', 'link');
        $header->update($data);
    
        return redirect()->route('admin.header.index')->with('success', 'Header updated successfully.');
    }

    public function destroy(Header $Header)
    {
        $Header->delete();

        return redirect()->route('admin.header.index')
                         ->with('success', 'Header deleted successfully.');
    }
}
