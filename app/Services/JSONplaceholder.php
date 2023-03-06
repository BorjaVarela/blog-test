<?php

namespace App\Services;

use GuzzleHttp\Client;

class JSONplaceholder
{

    public function get($route, $id = null)
    {
        $client = new Client([
            'base_uri' => config('services.api.jsonplaceholder')
        ]);
        $extra = [];
        if (!empty($id)) {
            $extra = ['id'=> $id];
        }

        $response = $client->request('GET', $route, ['query' => $extra]);
        return json_decode($response->getBody());
    }

    public function post($route, $json)
    {
        $client = new Client([
            'base_uri' => config('services.api.jsonplaceholder')
        ]);
        $response = $client->request('GET', $route, ['json' => $json]);
        return $response;
    }
}