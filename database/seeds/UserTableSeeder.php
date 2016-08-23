<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name'  => 'Daniela',
            'email' => 'admin@styde.com',
            'rol'   => 'admin',
            'password' => bcrypt('123')
        ]);
        factory(App\User::class,10)->create();
    }
}
