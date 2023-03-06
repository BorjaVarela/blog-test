<?php

namespace App\Models;

use App\Http\Resources\PostResource;
use App\Services\JSONplaceholder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements ModelInterface
{
    use HasFactory;

    public static function getAll()
    {
        $jsonPlaceholderService = new JSONplaceholder;
        $response = $jsonPlaceholderService->get('posts');

        return collect($response);
    }

    public static function getById($id)
    {
        $jsonPlaceholderService = new JSONplaceholder;
        $response = $jsonPlaceholderService->get('posts', $id);
        return $response[0];
    }
}
