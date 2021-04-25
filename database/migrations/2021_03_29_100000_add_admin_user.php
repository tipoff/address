<?php

use Illuminate\Database\Migrations\Migration;
use Tipoff\Authorization\Models\EmailAddress;
use Tipoff\Authorization\Models\User;

class AddAdminUser extends Migration
{
    public function up()
    {
        $user = User::factory()->admin()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'password' => bcrypt('password'),
        ]);

        EmailAddress::factory()->create([
            'email' => 'admin@example.com',
            'user_id' => $user->id,
        ]);
    }
}
