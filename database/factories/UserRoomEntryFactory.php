<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Room;
use App\Models\UserRoomEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRoomEntryFactory extends Factory
{
    protected $model = UserRoomEntry::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $room = Room::inRandomOrder()->first();

        if (!$user || !$room) {
            throw new \Exception("Nincs elérhető User vagy Room az adatbázisban.");
        }

        return [
            'user_id' => $user->id,
            'room_id' => $room->id,
            'successful' => $this->faker->boolean,
        ];
    }
}