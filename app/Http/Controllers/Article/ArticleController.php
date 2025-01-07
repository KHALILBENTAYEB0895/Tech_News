<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.article.index', [
            'articles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::where('isActive', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {   $imagePath = null;
        
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $validatedData = $request->validated();
        $validatedData['image'] = $imagePath;
            
        Article::create($validatedData +[
            'author_id' => Auth::user()->id
        ]);
           
        return  redirect()->route('articles.index')->with('success', 'Article created successfully');
        
    }
    /**
     * Display the specified resource.
        */
    public function show(Article $article)
    {
        return view('back.article.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
