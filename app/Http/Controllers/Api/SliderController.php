<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;

class SliderController extends Controller
{
    public function slider()
{
    try {
        // Retrieve all sliders
        $sliders = Slider::all();
        
        // Check if any sliders are found
        if ($sliders->isEmpty()) {
            return response()->json(['status' => false, 'message' => 'No sliders found'], 404);
        }
        
        // Generate the asset URL for each slider's image path
        foreach ($sliders as $slider) {
            $slider->image_path = asset('sliders/' . $slider->image_path);
        }
        
        return response()->json(['status' => true, 'data' => $sliders], 200);
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json(['status' => false, 'message' => 'Failed to retrieve sliders', 'error' => $e->getMessage()], 500);
    }
}

}
