<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the  resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all(); //collection عبارة عن لوب او مصفوفة 
     return view('admin.tag.show' , [
         'tags' => $tags,
     ]);
        // return view('admin.tag.show');   
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag'); 
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
        Tag::create([
            'name'=> $request->post('name'),
            'slug'=> $request->post('slug'),
        ]); 
         return redirect()
        ->route('tag.index')
        ->with('alert.success' , "Tag created!" );
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
        $tag = tag::findOrFail($id);
        return view('admin.tag.edit', [ 'tag'=>$tag]); 
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

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
        return redirect()
        ->route('tag.index')
        ->with('alert.success' , "Tag Updated!" );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = tag::findOrFail($id);
        $tag->delete();
        return redirect()
        ->route('tag.index')
        ->with('alert.success' , "tag Deleted!" );
       }

    protected function chekRequest(Request $request){
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required',
            ]);
    }
}
