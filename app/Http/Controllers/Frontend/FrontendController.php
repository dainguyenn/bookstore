<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $books = Books::all();
        return view('welcome',compact('books'));
    }
}
