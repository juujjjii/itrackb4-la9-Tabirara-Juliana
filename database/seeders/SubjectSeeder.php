<?php

namespace Database\Seeders;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        // Lookup rows first
        $a = Prerequisite::create(['name' => 'Capstone Project 1']);
        $b = Prerequisite::create(['name' => 'Web Programming 1']);
        $c = Prerequisite::create(['name' => 'Networking 1']);

        Subject::create([
            'code' => 'CAP102', 'title' => 'Capstone Project 2',
            'units' => 3, 'is_active' => true, 'prerequisite_id' => $a->id,
        ]);

        Subject::create([
            'code' => 'ITP1333', 'title' => 'Information Assurance',
            'units' => 3, 'is_active' => true, 'prerequisite_id' => $c->id,
        ]);

        Subject::create([
            'code' => 'ITP1441', 'title' => 'System Administration',
            'units' => 3, 'is_active' => true, 'prerequisite_id' => $c->id,
        ]);

        Subject::create([
            'code' => 'ITRACKB4', 'title' => 'Web Programming 2',
            'units' => 3, 'is_active' => true, 'prerequisite_id' => $b->id,
        ]);

        Subject::create([
            'code' => 'ITP831', 'title' => 'Networking 2',
            'units' => 3, 'is_active' => true, 'prerequisite_id' => $c->id,
        ]);

        Subject::create([
            'code' => 'ITP123', 'title' => 'Data Analytics',
            'units' => 3, 'is_active' => false, 'prerequisite_id' => $b->id,
        ]);
    }
}