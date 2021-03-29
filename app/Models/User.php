<?php

namespace App\Models;

use Database\Factories\UserFactory;

class User extends \Tipoff\Authorization\Models\User
{
    public static function newFactory()
    {
        return new UserFactory();
    }
}
