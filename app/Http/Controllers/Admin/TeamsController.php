<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController                                                                                                                                                                            extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('url')) {
            $profileImage = $request->file('url');
            $path = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('photos'), $path);
        } else {
            $path = null;
        }
        Team::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $path,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.team.index')
                         ->with('success', 'Team created successfully.');
    }


    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'is_active' => 'sometimes|boolean',
    ]);

    // Collect the data to be updated
    $data = $request->only('title', 'description', 'is_active');

    if ($request->hasFile('url')) {
        // Handle the image upload
        $profileImage = $request->file('url');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('photos'), $imageName);

        // Set the new image path
        $data['url'] = $imageName;

        // Optionally, delete the old image file if it exists
        if ($team->photo && file_exists(public_path('photos/' . $team->photo))) {
            unlink(public_path('photos/' . $team->photo));
        }
    } else {
        // Keep the old image path if no new image is uploaded
        $data['photo'] = $team->photo;
    }

    // Update the new with the new data
    $team->update($data);

    return redirect()->route('admin.team.index')->with('success', 'Team updated successfully.');
}

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.team.index')
                         ->with('success', 'Team deleted successfully.');
    }
}