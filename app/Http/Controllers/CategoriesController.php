<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \App\Http\Requests\Categories\Store  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        Category::create($request->validated());

        flash(__('The category has been created successfully'))->success();

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \App\Http\Requests\Categories\Update  $request
     * @param  \App\Category  $category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, Category $category)
    {
        $category->update($request->validated());

        flash(__('The category has been updated successfully'))->success();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Category  $category
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        flash(__('The category has been deleted successfully'))->success();

        return redirect()->route('categories.index');
    }
}
