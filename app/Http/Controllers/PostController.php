<?php

namespace App\Http\Controllers;
use DB;
use App\Post;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;



class PostController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $posts = \DB::table('posts')->simplePaginate(3);

        return view('posts.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
          'post'=> 'required|max:300',
          'image'=>'nullable|image',
        ]);

        $post = new Post;

        // Check if a profile image has been uploaded   image|mimes:jpeg,png,jpg,gif|
        if ($request->hasfile('image')) {

            // Get image file
            $image = $request->file('image');
            $extension= $image->getClientOriginalExtension();
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filename = time() . '.' . $extension;
            // Upload image
            $image->move('public/storage', $filename);
            // Set user profile image path in database to filePath
            $post->image = $filename;
          }

        $post->post=$validatedData['post'];
        $post->user_id=\Auth::user()->id;
        $post->save();

        session()->flash('message','Post was created!');
        return redirect()->route('posts.index');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post'=> $post]);
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
        $post = Post::findOrFail($id);

        $validatedData =$request->validate([
          'post'=> 'required|max:300',
        ]);
        $post->post=$validatedData['post'];
        $post->user_id=\Auth::user()->id;
        $post->save();

        session()->flash('message','Post was updated!');
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('message','Post was deleted!');
    }
}
