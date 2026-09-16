<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    private function getBooks()
    {
        return [
            1 => ['id' => 1, 'isbn' => '978-0-13-468599-1', 'title' => 'Clean Code',                'author' => 'Robert C. Martin',   'pages' => 464],
            2 => ['id' => 2, 'isbn' => '978-0-596-00712-6', 'title' => 'Head First Design Patterns', 'author' => 'Freeman & Robson',   'pages' => 694],
            3 => ['id' => 3, 'isbn' => '978-1-59327-584-6', 'title' => 'Eloquent JavaScript',        'author' => 'Marijn Haverbeke',   'pages' => 472],
            4 => ['id' => 4, 'isbn' => '978-0-13-235088-4', 'title' => 'Clean Architecture',         'author' => 'Robert C. Martin',   'pages' => 432],
            5 => ['id' => 5, 'isbn' => '978-1-4919-1889-0', 'title' => 'Learning PHP',               'author' => 'David Sklar',        'pages' => 254],
            6 => ['id' => 6, 'isbn' => '978-1-4919-5902-2', 'title' => 'Refactoring',                'author' => 'Martin Fowler',      'pages' => 448],
        ];
    }

    public function index()
    {
        $books = $this->getBooks();
        return view('books.index', ['books' => $books]);
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
        $books = $this->getBooks();
        if (!isset($books[$id])) {
            abort(404);
        }
        return view('books.show', ['book' => $books[$id]]);
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
        $books = $this->getBooks();
        return view('books.featured', ['featured' => $books[1]]);
    }

    public function filter($pages = null)
    {
        $all = $this->getBooks();

        if ($pages === null) {
            $books = $all;
            $message = "Showing all books";
        } else {
            $books = [];
            foreach ($all as $b) {
                if ($b['pages'] == $pages) {
                    $books[] = $b;
                }
            }
            $message = "Showing books with $pages pages";
        }

        return view('books.filter', [
            'books'   => $books,
            'message' => $message,
            'pages'   => $pages,
        ]);
    }
}
