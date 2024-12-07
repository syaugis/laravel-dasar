<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate();

        return response()->json($books);
    }
}
