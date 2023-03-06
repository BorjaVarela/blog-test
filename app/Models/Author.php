<?php

namespace App\Models;

use App\Http\Resources\AuthorResource;
use App\Services\JSONplaceholder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model implements ModelInterface
{
    use HasFactory;

    public static function getAll()
    {
        $jsonPlaceholderService = new JSONplaceholder;
        $response = $jsonPlaceholderService->get('users');

        return collect($response);
    }

    public static function getById($id)
    {
        $jsonPlaceholderService = new JSONplaceholder;
        $response = $jsonPlaceholderService->get('users', $id);

        return $response[0];
    }
}
