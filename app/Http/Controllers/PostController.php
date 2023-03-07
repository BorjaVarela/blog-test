<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    /**
     * List of posts
     *
     * @return view
     */
    public function index()
    {
        try {
            $posts = Post::getAll();

            $return = view('index', compact('posts'));
        } catch (Exception $e) {
            $return = view('errors.500');
        }
        return $return;
    }

    /**
     * Show an a post with the author
     *
     * @param integer $id
     * @return view
     */
    public function show($id)
    {
        try {
            $post = Post::getById($id);
            $user = Author::getById($post->userId);
            $return = view('post', compact('post', 'user'));
        } catch (Exception $e) {
            $return = view('errors.500');
        }
        return $return;
    }
}
