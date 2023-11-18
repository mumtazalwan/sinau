<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mapel::create([
            'class_name' => 'Bahasa Indonesia',
            'image_path' => 'bahasa_indonesia',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Bahasa Inggris',
            'image_path' => 'bahasa_inggris',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Matematika',
            'image_path' => 'matematika',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Sejarah',
            'image_path' => 'sejarah',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'PKN',
            'image_path' => 'pekaen',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Biologi',
            'image_path' => 'biologi',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Kimia',
            'image_path' => 'kimia',
            'class_id' => 1
        ]);

        Mapel::create([
            'class_name' => 'Fisika',
            'image_path' => 'fisika',
            'class_id' => 1
        ]);
    }
}
