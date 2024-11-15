<?php

namespace Database\Seeders;

use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Level::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
            ['name' => 'User'],
        ];


        foreach ($data as $value) {
            Level::insert([
                'name' => $value ['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
