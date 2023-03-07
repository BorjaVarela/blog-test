<?php

namespace App\Services;

use GuzzleHttp\Client;

class JSONplaceholder
{

    public function get($route, $value = null, $field = null)
    {
        $client = new Client([
            'base_uri' => config('services.api.jsonplaceholder')
        ]);
        $extra = [];

        if (empty($field) && !empty($value)) {
            $extra = ['id'=> $value];
        } elseif (!empty($field) && !empty($value)) {
            $extra = [$field=> $value];
        }

        $response = $client->request('GET', $route, ['query' => $extra]);
        return json_decode($response->getBody());
    }

    public function post($route, $json)
    {
        $client = new Client([
            'base_uri' => config('services.api.jsonplaceholder')
        ]);
        $response = $client->request('POST', $route, ['json' => $json]);
        return $response;
    }
}