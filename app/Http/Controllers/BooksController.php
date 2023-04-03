<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get('http://127.0.0.1:8084/graphql?query={allBooks { id title description } }');

        $books = $response->json()['data']['books'];

        return view('book.index', ['books' => $books]);
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get('http://127.0.0.1:8084/graphql?query={ bookById(id: '.$id.') { id title description } }');

        $book = $response->json()['data']['book'];

        return view('book.show', ['book' => $book]);
    }
}
