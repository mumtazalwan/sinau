<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'class_name' => 10,
            'image_path' => 'kelas_sepuluh'
        ]);

        Kelas::create([
            'class_name' => 11,
            'image_path' => 'kelas_sebelas'
        ]);

        Kelas::create([
            'class_name' => 12,
            'image_path' => 'kelas_duabelas'
        ]);

        Kelas::create([
            'class_name' => 'UTBK',
            'image_path' => 'utebeka'
        ]);
    }
}
