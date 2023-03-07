<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
    public function post_index_web(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function post_exist_show_web(): void
    {
        $response = $this->get('/post/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function post_not_exist_show_web(): void
    {
        $response = $this->get('/post/1000');

        $response->assertStatus(404);
    }

    /** @test */
    public function post_index_api(): void
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200);
    }

    /** @test */
    public function post_store_with_all_fields(): void
    {
        $post = [
            'title' => 'Test',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad ',
            'username' => 'Delphine',
            'name' => 'Clementina DuBuque',
            'email' => 'test@test.test',
            'address' => [
                'street' => 'Kattie Turnpike',
                'suite' => 'Apt. 20',
                'city' => 'Lebsackbury',
                'zipcode' => '31428-2261',
                'geo' => [
                    'lat' => "-38.2386",
                    'lng' => "57.2232"
                ]
            ],
            "phone" => "666666666",
            "website" => "ambrose.net",
            "company" => [
                "name" => "Test SCC",
                "catchPhrase" => "Centralized empowering task-force",
                "bs" => "target end-to-end models"
            ]
        ];

        $response = $this->postJson('/api/posts', $post);
        $response
        ->assertStatus(200)
        ->assertJsonPath('status', 'OK');
    }
}
