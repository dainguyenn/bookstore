<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BooksStoreRequest;
use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        $authors = Authors::all();
        return view('admin.books.index',compact(['books','authors']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Authors::all();

        return view('admin.books.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BooksStoreRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'avaliable_quantity' => 'numeric|min:0',
            'price' => 'numeric|min:0',
        ]);
        $image = $request->file('image')->store('public/books');
         Books::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'avaliable_quantity' => $request->avaliable_quantity,
            'price' => $request->price,
            'discount' => $request->discount, 
            'author_id' => $request->author_id, 
            'created_by' => auth()->user()->name, 
         ]); 
          
        return to_route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
        $authors = Authors::all();
        return view('admin.books.update',compact(['book','authors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'avaliable_quantity' => 'required'
        ]);

        $image = $book->image;
        if($request->hasFile('image')){
            Storage::delete($image);
            $image = $request->file('image')->store('public/books');
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'avaliable_quantity' => $request->avaliable_quantity,
            'price' => $request->price,
            'discount' => $request->discount, 
            'author_id' => $request->author_id, 
            'updated_by' => auth()->user()->name, 
         ]); 

        return to_route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        Storage::delete($book->image);
        $book->delete();

        return to_route('admin.books.index');

    }
}
