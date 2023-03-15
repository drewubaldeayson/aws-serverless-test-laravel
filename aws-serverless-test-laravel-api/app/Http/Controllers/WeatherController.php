<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\ApiToken;

class WeatherController extends Controller
{
    /**
     * Display the weather data by post code
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //Authenticatd the API key/token first
        if(!ApiToken::authenticate($request))
            return [
                'error' => 'Unauthorized Access!'
            ];

        $postalCode = $request->postalCode;
        $countryCode = $request->countryCode;
        
        //Check if postal code parameter exists
        if(!isset($postalCode)){
            return [
                "error" => "Postal code parameter is missing"
            ];
        }

        //Check if country code parameter exists
        if(!isset($countryCode)){
            return [
                "error" => "Country code parameter is missing"
            ];
        }
        
        //Fetch data from the OpenWeatherMap API with the zip,country, and appid as the main parameters
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather?zip='.$postalCode.','.$countryCode.'&appid=dc1b70513df44a7b4186d5f287a9e3af');

        //Convert the response data to json
        $data = $response->json();

        //Check if the response is failed
        $isFailed = $response->failed();

        //If the response is failed, it will return an error
        if($isFailed){
            //TODO: Insert error logs here for failure tracking
            return [
                "error" => "Something went wrong with the API. Please try again later. We will make sure to log this incident, so it might not happen next time. Thank you for your patience.",
            ];
        }

        //return the required dataset in JSON format
        return [
            'lon' => $data['coord']['lon'],
            'lat' => $data['coord']['lat'],
            'main' => $data['weather'][0]['main'],
            'description' => $data['weather'][0]['description'],
            'temp' => $data['main']['temp'],
            'feels_like' => $data['main']['feels_like'],
            'temp_min' => $data['main']['temp_min'],
            'temp_max' => $data['main']['temp_max'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity']
        ];
    }
}
