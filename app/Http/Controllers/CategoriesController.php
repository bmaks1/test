<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository;
use App\Http\Requests\StoreCategory;

class CategoriesController extends Controller
{


    /**
     * @param CategoriesRepository $categories
     */
    protected $categories;

    public function __construct(CategoriesRepository $categories)
    {
        $this->categories =  $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        return view('categories.index', ['categories' => $this->categories->getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $validated = $request->validated();
        $this->categories->create($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show')
            ->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = $this->categories->getCategoriesDroplist();
        return view('categories.edit')
            ->withCategory($category)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $httpRequest
     * @param  Category  $category
     * @param  StoreCategory $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $httpRequest,Category $category, StoreCategory $request)
    {
        $validated = $request->validated();
        $this->categories->update($httpRequest,$category,$validated);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->categories->delete($category);
        return redirect()->route('categories.index');
    }
}
