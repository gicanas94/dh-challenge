<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'username' => 'admin',
            'email' => 'admin@ejercicio.dh',
            'password' => bcrypt('admin'),
            'is_admin' => true
        ]);

        App\User::create([
            'username' => 'noadmin',
            'email' => 'noadmin@ejercicio.dh',
            'password' => bcrypt('noadmin'),
            'is_admin' => false
        ]);

        // factory(App\User::class, 50)->create();
    }
}
