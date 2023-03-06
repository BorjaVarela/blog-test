<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * List of posts
     *
     * @return view
     */
    public function index(Client $client)
    {
        try {
            $posts = Post::getAll();
            $users = Author::getAll();

            $return = view('index', compact('posts', 'users'));
        } catch (Exception $e) {
            $return = view('errors.500');
        }
        return $return;
    }

    public function show(Client $client, $id)
    {
        try {
            $post = Post::getById($id);
            $user = Author::getById($post->userId);
            $return = view('post', compact('post', 'user'));
        } catch (Exception $e) {
            dd($e->getMessage());
            $return = view('errors.500');
        }
        return $return;
    }
}
