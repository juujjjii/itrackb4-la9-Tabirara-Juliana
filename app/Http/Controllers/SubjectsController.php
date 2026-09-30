<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    private function getSubjects()
    {
        $path = storage_path('app/subjects.json');
        $data = json_decode(file_get_contents($path), true);

        $subjects = [];
        foreach ($data as $s) {
            $subjects[$s['id']] = $s;
        }
        return $subjects;
    }

    private function saveSubjects(array $subjects)
    {
        $path = storage_path('app/subjects.json');
        file_put_contents($path, json_encode(array_values($subjects), JSON_PRETTY_PRINT));
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
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'  => 'required|string|max:20',
            'title' => 'required|string|max:100',
            'units' => 'required|in:1,2,3',
        ]);

        $subjects = $this->getSubjects();

        $newId = empty($subjects) ? 1 : max(array_keys($subjects)) + 1;

        $subjects[$newId] = [
            'id'    => $newId,
            'code'  => $validated['code'],
            'title' => $validated['title'],
            'units' => $validated['units'],
        ];

        $this->saveSubjects($subjects);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function show(string $id)
    {
        $subjects = $this->getSubjects();
        if (!isset($subjects[$id])) {
            abort(404);
        }
        $subject = $subjects[$id];
        return view('subjects.show', ['subject' => $subject]);
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
}