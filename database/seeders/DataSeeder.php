<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Data;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::disableForeignKeyConstraints();
        Data::truncate();
        Schema::enableForeignKeyConstraints();


        $data = [
            [
                'name' => 'Carl Gallagher',
                'email' => 'Carl@gmail.com',
                'phone' => '081234567891',
                'levels_id' => 3,
            ],
            [
                'name' => 'Fiona Gallagher',
                'email' => 'fiona@gmail.com',
                'phone' => '081234567892',
                'levels_id' => 3,
            ],
            [
                'name' => 'Dabbies Gallagher',
                'email' => 'dabbies@gmail.com',
                'phone' => '081234567899',
                'levels_id' => 3,
            ],
        ];

        foreach ($data as $value) {
            Data::insert([
                'name' => $value ['name'],
                'email' => $value ['email'],
                'phone' => $value ['phone'],
                'levels_id' => $value ['levels_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
