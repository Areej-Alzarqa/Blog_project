<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\tag;
use App\category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); //collection عبارة عن لوب او مصفوفة 
      //  dd($posts->image);
        return view('admin.post.show' , [
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
        return view('admin.post.post'); 
        // return view('user.post'); 
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->chekRequest( $request);

        $image_path = null;
        if($request->hasFile('image')&& $request->file('image')->isValid()){
                    $image = $request->file('image');
                    $image_path = $image->store('public');
                }
                
        $post = new post;
        // Post::create([
        //     'title'=> $request->post('title'),
        //     'subtitle' => $request->post('subtitle'),
        //     'content' => $request->post('content'),
        //     'stauts' => $request->post('stauts'),
        // ]); 
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->slug = $request->slug;
        $post->image =$image_path;
        $post->save();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        
        return redirect()
     ->route('post.index')
     ->with('alert.success' , "Post created!" );
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
    public function edit($id)
    {
        $post = post::findOrFail($id);
        return view('admin.post.edit', [ 'post'=>$post]); 
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
        $this->chekRequest( $request);
        
        $image_path = null;
        if($request->hasFile('image')&& $request->file('image')->isValid()){
                    $image = $request->file('image');
                    $image_path = $image->store('public');
                }
                
        $post = Post::findOrFail($id);
        $data = $request->except('image');
        $data['image'] =$image_path;
        $post->update($data);
        
        // $post->update($request->all());

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect()
        ->route('post.index')
        ->with('alert.success' , "Post Updated!" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return redirect()
        ->route('post.index')
        ->with('alert.success' , "Post Deleted!" );
    }

    protected function chekRequest(Request $request){
        $request->validate([
            'title'=> 'required|string|max:255|min:2',
            'subtitle' =>'required|string|max:255|min:2',
            'content' =>'required',
            'slug' =>'required',
            
           
            ]);
    }
}
