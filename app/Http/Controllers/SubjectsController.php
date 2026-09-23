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

    public function index(Request $request)
    {
        $subjects = $this->getSubjects();

        $code  = $request->query('code', '');
        $units = $request->query('units', '');

        if ($code !== '') {
            $subjects = array_filter($subjects, function ($s) use ($code) {
                return $s['code'] === $code;
            });
        }

        if ($units !== '') {
            $subjects = array_filter($subjects, function ($s) use ($units) {
                return $s['units'] == $units;
            });
        }

        return view('subjects.index', [
            'subjects'    => $subjects,
            'allSubjects' => $this->getSubjects(),
            'code'        => $code,
            'units'       => $units,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $subjects = $this->getSubjects();
        if (!isset($subjects[$id])) {
            abort(404);
        }
        return view('subjects.show', ['subject' => $subjects[$id]]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function featured()
    {
        $subjects = $this->getSubjects();
        return view('subjects.featured', ['featured' => $subjects[4]]);
    }

}