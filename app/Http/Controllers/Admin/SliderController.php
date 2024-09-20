<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $Sliders = Slider::all();
        return view('admin.slider_images.index', compact('Sliders'));
    }

    public function create()
    {
        return view('admin.slider_images.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $path = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('sliders'), $path);
        } else {
            $path = null;
        }
        Slider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $path,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.slider_images.index')
                         ->with('success', 'Slider image created successfully.');
    }


    public function edit(Slider $slider)
    {
        return view('admin.slider_images.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'is_active' => 'sometimes|boolean',
    ]);

    // Collect the data to be updated
    $data = $request->only('title', 'description', 'is_active');

    if ($request->hasFile('image')) {
        // Handle the image upload
        $profileImage = $request->file('image');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        $profileImage->move(public_path('sliders'), $imageName);

        // Set the new image path
        $data['image_path'] = $imageName;

        // Optionally, delete the old image file if it exists
        if ($slider->image_path && file_exists(public_path('sliders/' . $slider->image_path))) {
            unlink(public_path('sliders/' . $slider->image_path));
        }
    } else {
        // Keep the old image path if no new image is uploaded
        $data['image_path'] = $slider->image_path;
    }

    // Update the slider with the new data
    $slider->update($data);

    return redirect()->route('admin.slider_images.index')->with('success', 'Slider image updated successfully.');
}

    public function destroy(Slider $Slider)
    {
        $Slider->delete();

        return redirect()->route('admin.slider_images.index')
                         ->with('success', 'Slider image deleted successfully.');
    }
}
