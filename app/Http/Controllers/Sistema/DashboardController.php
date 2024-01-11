<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->input('city'); // ou substitua pela cidade desejada

        $apiKey = 'SUA_CHAVE_DE_API_AQUI'; // Substitua pela sua chave de API

        $client = new Client();

        $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric', // Unidade de medida (pode ser 'metric', 'imperial', etc.)
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return response()->json($data);
    }
}
