<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Chenshuai1993\Weather\Weather;

class WeatherController extends Controller
{
   /* public function show(Request $request, Weather $weather, $city)
    {
        return $weather->getLiveWeather($city);
    }*/


    public function show(Request $request, $city)
    {
          print_r(app('weather')->getLiveWeather($city));
          print_r(app('weather')->getLiveWeather($city, 'xml'));
          print_r(app('weather')->getForecastsWeather($city));
    }
}
