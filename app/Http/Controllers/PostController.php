<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('dashboard.posts.create',[
            'tags'          => Tag::all(),
            'categories'    => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        
        $tags = explode(',', $request->tags);

        $post                   = new Post;
        $post->title            = $request->title;
        $post->body             = $request->body;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;
        
        
        if($request->hasFile('cover_image')){
            $image          = $request->file('cover_image');
            $imageName      = $image->getClientOriginalName();
            $imageNewName   = explode('.',$imageName);
            $fileExtenton   = time().'.'. $imageNewName . '.' . $image->getClientOriginalRxtention();

            $location       = storage_path('images/' . $fileExtenton);

            Image::make($image)->resize(1200,630)->save($location);

            $post->cover_image      = $fileExtenton;

        }
        
        $post->save();
        $post->sync($tags);
        
        return redirect()->route('posts.index')->with('success','Post Created Successfullu!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
