<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reward::updateOrCreate([
            'id' => 1
        ], [
            'name' => 'Me :)',
            'value' => 1,
            'bought' => true
        ]);

        Reward::updateOrCreate([
            'id' => 2
        ], [
            'name' => 'A very carefully written letter',
            'value' => 5,
            'bought' => false
        ]);

        Reward::updateOrCreate([
            'id' => 3
        ], [
            'name' => 'Mega Milka Reep',
            'value' => 3,
            'bought' => false
        ]);

        Reward::updateOrCreate([
            'id' => 4
        ], [
            'name' => 'No blanket stealing - 1 Night',
            'value' => 2,
            'bought' => false
        ]);

        Reward::updateOrCreate([
            'id' => 5
        ], [
            'name' => 'Mystery Gift',
            'value' => 25,
            'bought' => false
        ]);
    }
}
