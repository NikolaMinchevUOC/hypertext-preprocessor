<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'admin@gmail.com';
        $user->email = 'admin@gmail.com';
        $user->password = 'admin@gmail.com';
        $user->role = 'admin';

        $user->save();

        $user1 = new User;
        $user1->name = 'niko@gmail.com';
        $user1->email = 'niko@gmail.com';
        $user1->password = 'niko@gmail.com';
        $user1->role = 'user';

        $user1->save();

        $user2 = new User;
        $user2->name = 'profesor@gmail.com';
        $user2->email = 'profesor@gmail.com';
        $user2->password = 'profesor@gmail.com';
        $user2->role = 'profesor';

        $user2->save();
    }
}
