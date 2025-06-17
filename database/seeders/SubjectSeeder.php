<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subjects = [
            ['name' => 'Pemrograman Web', 'sks' => 3],
            ['name' => 'Database', 'sks' => 3],
            ['name' => 'Algoritma', 'sks' => 2],
            ['name' => 'Jaringan Komputer', 'sks' => 3],
            ['name' => 'Sistem Operasi', 'sks' => 2],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
