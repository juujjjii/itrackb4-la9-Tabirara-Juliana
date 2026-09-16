<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    private function getSubjects()
    {
        return [
            1 => ['id' => 1, 'code' => 'CAP102',   'title' => 'Capstone Project 2',    'units' => 3],
            2 => ['id' => 2, 'code' => 'ITP1333',  'title' => 'Information Assurance', 'units' => 3],
            3 => ['id' => 3, 'code' => 'ITP1441',  'title' => 'System Administration', 'units' => 3],
            4 => ['id' => 4, 'code' => 'ITRACKB4', 'title' => 'Web Programming 2',     'units' => 3],
            5 => ['id' => 5, 'code' => 'ITP831',   'title' => 'Networking 2',          'units' => 3],
            6 => ['id' => 6, 'code' => 'ITP123',   'title' => 'Data Analytics',        'units' => 3],
        ];
    }

    public function index()
    {
        $subjects = $this->getSubjects();
        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $subjects = $this->getSubjects();
        if (!isset($subjects[$id])) {
            abort(404);
        }
        return view('subjects.show', ['subject' => $subjects[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $subjects = $this->getSubjects();
        return view('subjects.featured', ['featured' => $subjects[4]]);
    }

    public function filter($units = null)
    {
        $all = $this->getSubjects();

        if ($units === null) {
            $subjects = $all;
            $message = "Showing all subjects";
        } else {
            $subjects = [];
            foreach ($all as $subjects) {
                if ($subjects['units'] == $units) {
                    $subjects[] = $subjects;
                }
            }
            $message = "Showing subjects with $units units";
        }

        return view('subjects.filter', [
            'subjects' => $subjects,
            'message' => $message,
            'units' => $units,
        ]);
    }
}