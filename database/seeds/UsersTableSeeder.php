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
        // Create default user
        $user = \App\User::create([
            'first_name' => 'tosif',
            'last_name' => 'Saiyad',
            'email' => 'tosif@bigscal.com',
            'password' => bcrypt('tosif123'),
            'gender' => 'male', 
            'age' => 28, 
            'address' => "Surat, Gujarat, India"
        ]);
    }
}
