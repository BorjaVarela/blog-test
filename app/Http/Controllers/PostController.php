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
        $posts = Post::getAll();

        $return = view('index', compact('posts'));

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

            return view('post', compact('post', 'user'));
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }

    }
}
