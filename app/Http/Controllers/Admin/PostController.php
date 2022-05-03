<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
            ->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //scrivo le validazioni dei dati del form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'cover' => 'nullable|url',
            'published_at' => 'nullable|before_or_equal:today',
        ]);

        $data = $request->all();
        
        $slug = Post::getUniqueSlug( $data['title'] );

        $post = new Post();
        $post->fill( $data );
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //scrivo le validazioni dei dati del form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'cover' => 'nullable|url',
            'published_at' => 'nullable|before_or_equal:today',
        ]);

        $data = $request->all();

        // controllo che il titolo attuale è diverso da quello che ci arriva 
        if( $post->title != $data['title'] ){
            $slug = Post::getUniqueSlug( $data['title'] );
        }

        $data['slug'] = $slug;
        $post->update( $data );

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
