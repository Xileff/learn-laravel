<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil gate
        $this->authorize('admin');
        return view('dashboard.categories.index', [
            "title" => "Laravel 9 | Categories",
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view("dashboard.categories.create", ["title" => "Laravel 9 | Create Catagory"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');

        // validasi
        $validatedData = $request->validate([
            "name" => "required|unique:categories|max:255",
            "slug" => "required|unique:categories"
        ]);

        // insert
        Category::create($validatedData);

        return redirect("/dashboard/categories")->with("success", "Category added");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $this->authorize('admin');
        return view("dashboard.categories.edit", [
            "title" => "Laravel 9 | Categories",
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories'
        ]);

        Category::where('id', $category->id)->update($validatedData);

        return redirect("/dashboard/categories")->with("success", "Category updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        Category::destroy($category->id);
        return redirect("/dashboard/categories")->with("success", "Category deleted");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
