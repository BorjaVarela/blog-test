<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return json
     */
    public function index()
    {
        try {
            $posts = Post::getAll();
            $authors = Author::getAll();
            $posts->transform(function($item, $key) use ($authors) {
                $author = $authors->firstWhere('id', $item->userId);
                $item->author = $author;
                return $item;
            });
            return response()->json([
                'status' => 'OK',
                'results' => $posts
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'KO',
                'error' => 'An error has occurred'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return json
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'title' => 'required|max:255',
                'body' => 'required',
                'username' => 'required',
                'email' => 'nullable|email'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'KO',
                    'error' => $validator->getMessageBag()
                ]);
            } else {
                $post = new stdClass;
                $post->title = $request->input('title');
                $post->body = $request->input('body');
                $author = Author::getBy('username', $request->input('username'));
                if (empty($author)) {
                    $author = new stdClass;
                    $author->username = $request->input('username');
                }
                $author->name = $request->input('name') ?? $author->name ?? "";
                $author->email = $request->input('email') ?? $author->email ?? "";
                $author->phone = $request->input('phone') ?? $author->phone ?? "";
                $author->website = $request->input('website') ?? $author->website ?? "";

                $address = $request->input('address');
                if (!empty($address)) {
                    $author->address = [
                        'street' => $address['street'] ?? $author->address->street ?? "",
                        'suite' => $address['suite'] ?? $author->address->suite ?? "",
                        'city' => $address['city'] ?? $author->address->city ?? "",
                        'zipcode' => $address['zipcode'] ?? $author->address->zipcode ?? "",
                        'geo' => $address['geo'] ?? $author->address->geo ?? ""
                    ];
                }

                $company = $request->input('company');
                if (!empty($company)) {
                    $author->company = [
                        'name' => $company['name'] ?? $author->company->name ?? "",
                        'catchPhrase' => $company['catchPhrase'] ?? $author->company->catchPhrase ?? "",
                        'bs' => $company['bs'] ?? $author->company->bs ?? ""
                    ];
                }

                $post->author = $author;
                return response()->json([
                    'status' => 'OK',
                    'result' => $post
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 'KO',
                'error' => 'An unexpeced error has ocurred'
            ]);
        }
    }

}
