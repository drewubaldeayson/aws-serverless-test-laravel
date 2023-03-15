<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display the weather data by post code
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return [
            "lon" => 150.8667,
            "lat" => -33.7167,
            "main" => "Clouds",
            "description" => "overcast clouds",
            "temp" => 290.27,
            "feels_like" => 290.23,
            "temp_min" => 288.57,
            "temp_max" => 291.11,
            "pressure" => 1028,
            "humidity" => 84
        ];
    }
}
