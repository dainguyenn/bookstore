<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    public function home()
    {
        $books = Books::all();
        return view('welcome',compact('books'));
    }

    public function showDetail(Books $book)
    { 
        $author = Authors::select('name')->where('id','=',$book->author_id)->get();
       
        return view('frontend.bookDetail',compact(['book','author']));
    }

    public function getCard()
    {
        
    }
}
