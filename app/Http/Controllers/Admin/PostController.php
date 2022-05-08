<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
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
        // tramite il metodo with faccio in modo che basti fare una sola query per le join con la tabella categories
        $posts = Post::with(['category','tags'])
            ->orderBy('created_at','desc')
            ->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        // prendo tutte le categorie dalla tabella categories 
        $categories = Category::orderBy('name', 'asc')
            ->get();
        //Prendo tutti itag dalla tabella tags
        $tags = Tag::orderBy('name', 'asc')
            ->get();
        return view('admin.posts.create', compact('post','categories','tags'));
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
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ]);

        $data = $request->all();
        
        $slug = Post::getUniqueSlug( $data['title'] );

        $post = new Post();
        $post->fill( $data );
        $post->slug = $slug;
        $post->save();

        // dd($data['tags']);
        if( array_key_exists('tags', $data)){ //se esiste 'tags' nell'array $data
            $post->tags()->attach( $data['tags'] );
        }

        // dd($post);
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
        $categories = Category::orderBy('name', 'asc')
            ->get();
        $tags = Tag::orderBy('name','asc')
            ->get();
        // dd($tags);
        return view('admin.posts.edit', compact('post','categories','tags'));
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
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
        ]);

        $data = $request->all();

        // dd($data);
        // controllo che il titolo attuale è diverso da quello che ci arriva 
        if( $post->title != $data['title'] ){
            $slug = Post::getUniqueSlug( $data['title'] );
            $data['slug'] = $slug;
        }

        if( array_key_exists('tags', $data)){ //se esiste 'tags' nell'array $data
            $post->tags()->sync( $data['tags'] );
        }else{
            $post->tags()->sync([]);
        }

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
