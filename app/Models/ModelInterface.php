<?php

namespace app\Models;

interface ModelInterface
{
    public static function getAll();

    public static function getById($id);
}