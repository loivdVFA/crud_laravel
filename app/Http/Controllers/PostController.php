<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        // $posts = Post::paginate(5);
        // $posts = Cache::remember('posts', 30, function () {
        //     return Post::with('category')->paginate(5);
        // });
        return View('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return View('create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => ['required', 'max:1024', 'image'],
            'title' => ['required', 'max:100'],
            'category_id' => ['required'],
            'description' => ['required'],
        ]);
        $post = new Post();
        $fileName = time() . '-' . $request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('upload', $fileName);
        $post->title = $request->title;
        $post->image = $filePath;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save();
        return  redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return View('show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return View('edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::findOrFail($id);
        $request->validate([
            'title' => ['required', 'max:100'],
            'category_id' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $request->validate(([
                'image' => ['required', 'max:1024', 'image'],
            ]));
            $fileName = time() . '-' . $request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('upload', $fileName);
            File::delete(public_path($post->image));
            $post->image = $filePath;
        }

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('index');        
    }

    public function trashed() {
        return 'hello';
    }
}
