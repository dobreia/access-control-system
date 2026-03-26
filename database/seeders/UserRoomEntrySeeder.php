<?php
namespace Database\Seeders;

use App\Models\UserRoomEntry;
use Illuminate\Database\Seeder;

class UserRoomEntrySeeder extends Seeder
{
    public function run()
    {
        
        $users = \App\Models\User::all();
        $rooms = \App\Models\Room::all();

        if ($users->isEmpty() || $rooms->isEmpty()) {
            $this->command->info('Nincs elérhető User vagy Room rekord az adatbázisban. Generálj néhány adatot előbb!');
            return;
        }

        
        for ($i = 0; $i < 10; $i++) {
            UserRoomEntry::factory()->create();
        }
    }
}