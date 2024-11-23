<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Position;
use App\Models\Room;
use App\Models\UserRoomEntry;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'phone_number' => rand(1000000000, 9999999999),
            'card_number' => Str::random(16),
            'admin' => true,
        ]);

        // Create Users
        User::factory()->count(10)->create();
        Position::factory()->count(5)->create();
        Room::factory()->count(5)->create();
        // UserRoomEntry::factory()->count(5)->create();


        // assigning pivot tables

        $users = User::all();
        $positions = Position::all();
        $rooms = Room::all();
        $users->each(function ($user) use ($positions) {
            $user->positions()->attach($positions->random(2));  // Assign random positions to the user
        });
        $rooms->each(function ($room) use ($positions) {
            $room->positions()->attach($positions->random(2));  // Assign random positions to the room
        });
        $users->each(function ($user) use ($rooms) {
            $userPositions = $user->positions->pluck('id')->toArray(); // Get user's position IDs

            $rooms->each(function ($room) use ($user, $userPositions) {
                $roomPositions = $room->positions->pluck('id')->toArray(); // Get room's position IDs

                // Check if there's a matching position
                $hasAccess = !empty(array_intersect($userPositions, $roomPositions));

                // Create UserRoomEntry
                UserRoomEntry::create([
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'successful' => $hasAccess,
                ]);
            });
        });

    }
}
