<?php

namespace App\Models;

use App\Http\Resources\PostResource;
use App\Services\JSONplaceholder;
use Exception;
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

        if (empty($response)) {
            throw new Exception("The post not exist");
        } else {
            return $response[0];
        }
    }
}
