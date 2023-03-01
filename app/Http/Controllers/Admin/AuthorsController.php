<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorStoreRequest; 
use App\Models\Authors;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class AuthorsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::all()->where('active',true);
        return view('admin.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorStoreRequest $request)
    {
         
        $request->validate(['author_name'=>'required'],['author_name.required'=>'kkk']); 

        $avatar = $request->file('avatar')->store('public/authors'); 
        
         Authors::create([
            'name' => $request->name,
            'avatar' => $avatar,
            'dob' => $request->dob,
            'address' => $request->address,
            'story' => $request->story,
            'created_by' => auth()->user()->name,
            'updated_by'=>''
         ]);
        
          
        return to_route('admin.author.index');
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
    public function edit(Authors $author)
    {

        return view('admin.author.update',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authors $author)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Trường name không được để trống'
        ]);

        $avatar = $author->avatar;
        if($request->hasFile('avatar')){
            Storage::delete($avatar);
            $avatar = $request->file('avatar')->store('public/authors');
        }

        $author->update([
            'name' => $request->name,
            'avatar' => $avatar,
            'dob' => $request->dob,
            'address' => $request->address,
            'story' => $request->story,


        ]);

        return to_route('admin.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $author)
    {
        Storage::delete($author->avatar);
        $author->delete();

        return to_route('admin.authors.index');

    }
}
