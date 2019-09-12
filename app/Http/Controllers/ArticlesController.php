<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticle;
use App\Repositories\ArticlesRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * @param ArticlesRepository $articles
     */
    protected $articles;

    /**
     * @param CategoriesRepository $categories
     */
    protected $categories;

    public function __construct(ArticlesRepository $articles,CategoriesRepository $categories)
    {
        $this->articles =  $articles;
        $this->categories =  $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        return view('articles.index', ['articles' => $this->articles->getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->getCategoriesDroplist();
        return view('articles.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticle $request
     * @param Request $httpRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $httpRequest,StoreArticle $request)
    {
        $validated = $request->validated();
        $this->articles->create($httpRequest,$validated);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('articles.show')
            ->withArticle($article)
            ->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = $this->categories->getCategoriesDroplist();
        return view('articles.edit')
            ->withArticle($article)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $httpRequest
     * @param  Article  $article
     * @param  StoreArticle $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $httpRequest,Article $article, StoreArticle $request)
    {
        $validated = $request->validated();
        $this->articles->update($httpRequest,$article,$validated);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->articles->delete($article);
        return redirect()->route('articles.index');
    }
}
