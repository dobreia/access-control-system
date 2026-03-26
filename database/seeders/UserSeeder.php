<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => 'password', 
            'admin' => true,
            'phone_number' => '123456789',
            'card_number' => 'ABC123DEF456GHI7',
            'position_id' => 1, 
        ]);

        
        User::factory()->count(10)->create();
    }
}