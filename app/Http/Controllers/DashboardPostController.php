<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return view('dashboard.posts.index', [
            "title" => "Laravel 9 | My Posts",
            "posts" => Post::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.posts.create', [
            "title" => "Laravel 9 | My Posts",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            // simpan gambar ke direktori, sekaligus ambil namanya buat disimpen di database
            $validatedData['image'] = $request->file('image')->store('public/post-images');
            // defaultnya store akan mereturn string "public/direktori"
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post successfully uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view("dashboard.posts.show", [
            "title" => "Laravel 9 | My Posts",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.edit', [
            "title" => "Laravel 9 | My Posts",
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // post adalah data postingan yang lama.
    // Controller ini bisa tau karena route model binding dari halaman dashboard.posts ke dashboard.posts.edit
    public function update(Request $request, Post $post)
    {
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        // pengecekan slug hanya dilakukan jika slug diganti
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        if ($request->file('image')) {
            if ($post->image) Storage::delete($post->image);
            $validatedData['image'] = $request->file('image')->store('public/post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) Storage::delete($post->image);
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfully.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
