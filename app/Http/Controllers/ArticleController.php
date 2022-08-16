<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::selectArticles();
    
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $articles = Article::selectArticles();

        return view('article.create', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        $request->validate([
            'titre' => 'required|max:50|min:2',
            'titre_fr' => 'required|max:50|min:2',
            'contenu' => 'required|max:500|min:4',
            'contenu_fr' => 'required|max:500|min:4',
        ]);

        $article =Article::create([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'etudientId' => $id
        ]);
        
        return redirect(route('article.show', $article->id));   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        if($article->etudientId == $id){
       return view('article.show', ['article' => $article]);
        }else{
            return redirect(route('logout'));  
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        if($article->etudientId == $id){
       return view('article.edit', ['article' => $article]);
        }else{
            return redirect(route('logout'));  
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        $request->validate([
            'titre' => 'required|max:30|min:2',
            'titre_fr' => 'required|max:30|min:2',
            'contenu' => 'required|max:500|min:4',
            'contenu_fr' => 'required|max:500|min:4',
        ]);
       
        $article->update([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'etudientId' => $id
        ]);

        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        if($article->etudientId == $id){
        return redirect(route('article.show', $article->id));
        }else{
            return redirect(route('logout'));  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $article->delete();
        $id = 0;
        if(Auth::check()){
            $id = Auth::user()->id;
        }
        if($article->etudientId == $id){
        return redirect(route('article.index'));
        }else{
            return redirect(route('logout'));  
        }
    }
}
