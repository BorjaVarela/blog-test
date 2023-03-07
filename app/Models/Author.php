<?php

namespace App\Models;

use App\Http\Resources\AuthorResource;
use App\Services\JSONplaceholder;
use Exception;
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

        if (empty($response)) {
            throw new Exception("The author not exist");
        } else {
            return $response[0];
        }
    }

    public static function getBy($field, $value)
    {
        $jsonPlaceholderService = new JSONplaceholder;
        $response = $jsonPlaceholderService->get('users', $value, $field);

        if (empty($response)) {
            return $response;
        } else {
            return $response[0];
        }
    }
}
