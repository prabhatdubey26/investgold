<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Validation\ValidationException;
use MichaelNabil230\Weather\Weather;
use Illuminate\Support\Facades\Http;


class WeatherController extends Controller
{
    public function weather()
    {
        return view('weather');
    }
    //search validation
    public function search(Request $request)
    {
        // Validate
        $request->validate([
            'city' => 'required|string|max:255',
        ]);
    
        $city = $request->input('city');
    
        try {
            // Make the API request
             $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                 'q' => $city, 
                 'appid' => '49c0bad2c7458f1c76bec9654081a661',
             ]);
    
            
            if ($response->successful()) {
                $data = $response->json();
                return view('weather', ['data' => $data]);
            } else {
                return view('weather', ['error' => 'Error fetching weather data.']);
            }
        } catch (\Exception $e) {
            
            return view('weather', ['error' => 'Error fetching weather data.']);
        }
    }
}
