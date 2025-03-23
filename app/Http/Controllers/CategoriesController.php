<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(config('app.pagination_limit'));
        // return $categories;
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {

        $category = Categories::create($request->only('title', 'description', 'status'));

        if ($request->hasFile('image')) {
            $category->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categories::findOrFail($id);

        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $categories = Categories::findOrFail($id);

        //check inactive if products are associated with this category
        if ($categories->products()->exists() && $request->status == 'inactive') {
            return redirect()->route('categories.index')->with('error', 'Category cannot be inactive as it has associated products.');
        }

        // Check if the image is present in the request
        if ($request->hasFile('image')) {
            $categories->deleteImage();
            $categories->addMedia($request->file('image'))->toMediaCollection('image');
        }
        $categories->update($request->only('title', 'description', 'status'));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {

        //check inactive if products are associated with this category
        if ($category->products()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Category cannot be inactive as it has associated products.');
        }

        // Check if the category has any associated media
        if ($category->hasMedia('image')) {
            $category->deleteImage();
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
