<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tipoff\Authorization\Models\EmailAddress;
use Tipoff\Authorization\Models\User;

class AddAdminUser extends Migration
{
    public function up()
    {

        $user = User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Admin')->save();

        $user = EmailAddress::factory()->create([
            'email' => 'admin@example.com',
            'user_id' => $user->id,
        ]);
    }
}