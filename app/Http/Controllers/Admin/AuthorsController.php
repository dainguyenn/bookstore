<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorStoreRequest; 
use App\Models\Authors; 
use Illuminate\Http\Request;
use DB;

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
        return view('admin.author.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorStoreRequest $request)
    {
        $request->validate(['name'=>'required'],['name.required'=>'Tên không được để trống']);
        $image = $request->file('image')->store('public/authors'); 
        
         Authors::create([
            'name' => $request->name,
            'avatar' => $image,
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
