<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.author.index', [
            'authors' => User::where('role', 'author')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated() +[
            'password' => 'author123'
        ]);
        return redirect()->route('authors.index')->with('success', 'Author created successfully');
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
    public function edit(User $author)
    {
        return view('back.author.create', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $author)
    {
        
        $author->update($request->validated());
        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
