<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category','tags'])
            ->where('published_at','!=','null') //prendo solo i post che sono stati pubblicati
            ->orderBy('published_at','desc')
            ->paginate(12);
            
        return response()->json([
            'posts' => $posts,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)  //qui ci arriverà uno slug
    {
        // prendo il primo con lo slug uguale allo slug che arriva alla show
        $post = Post::with(['category','tags'])
            ->where('slug', $slug)
            ->first();

        if( $post ){
            return response()->json([
                'post' => $post,
                'succes' => true,
            ]);
        }
        // Se il post non dovesse essere trovato, verrà dato un errore 404
        return response()->json([
            'post' => 'Post not found',
            'success' => false,
        ],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
