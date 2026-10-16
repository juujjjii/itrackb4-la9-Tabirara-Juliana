<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'code'         => 'CAP102',
            'title'        => 'Capstone Project 2',
            'units'        => 3,
            'is_active'    => true,
            'prerequisite' => 'CAP101',
        ]);

        Subject::create([
            'code'      => 'ITP1333',
            'title'     => 'Information Assurance',
            'units'     => 3,
            'is_active' => true,
        ]);

        Subject::create([
            'code'      => 'ITP1441',
            'title'     => 'System Administration',
            'units'     => 3,
            'is_active' => true,
        ]);

        Subject::create([
            'code'         => 'ITRACKB4',
            'title'        => 'Web Programming 2',
            'units'        => 3,
            'is_active'    => true,
            'prerequisite' => 'ITRACKB3',
        ]);

        Subject::create([
            'code'      => 'ITP123',
            'title'     => 'Data Analytics1',
            'units'     => 3,
            'is_active' => false,
        ]);
    }
}