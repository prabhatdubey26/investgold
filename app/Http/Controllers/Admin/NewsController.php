<?php

namespace App\Http\Controllers\Admin;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $profileImage = $request->file('photo');
            $path = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('news'), $path);
        } else {
            $path = null;
        }
        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo' => $path,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.news.index')
                         ->with('success', 'News created successfully.');
    }


    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'is_active' => 'sometimes|boolean',
    ]);

    // Collect the data to be updated
    $data = $request->only('title', 'description', 'is_active');

    if ($request->hasFile('photo')) {
        // Handle the image upload
        $profileImage = $request->file('photo');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('news'), $imageName);

        // Set the new image path
        $data['photo'] = $imageName;

        // Optionally, delete the old image file if it exists
        if ($news->photo && file_exists(public_path('news/' . $news->photo))) {
            unlink(public_path('news/' . $news->photo));
        }
    } else {
        // Keep the old image path if no new image is uploaded
        $data['photo'] = $news->photo;
    }

    // Update the new with the new data
    $news->update($data);

    return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
}

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
                         ->with('success', 'News deleted successfully.');
    }
}

