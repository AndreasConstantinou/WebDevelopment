<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;


class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createComment(Request $request)
    {
          $comment = new Comment;

          $validatedData =$request->validate([

            'status' => 'success',
            'comment' => $request->message,

          ]);
          $comment->comment= $request->message;
          $comment->user_id=\Auth::user()->id;
          $comment->post_id=$request->id;
          $comment->save();
          return response()->json($comment->comment);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment'=> $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $comment = Comment::findOrFail($id);
          return view('comments.edit', ['comment'=> $comment]);
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
      $comment = Comment::findOrFail($id);

      $validatedData =$request->validate([
        'comment'=> 'required|max:300',
      ]);
      $comment->comment=$validatedData['comment'];
      $comment->user_id=\Auth::user()->id;
      $comment->post_id=$comment->post_id;
      $comment->save();

      session()->flash('message','Post was updated!');
      return redirect()->route('posts.show',['id'=> $comment->post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $comment = Comment::findOrFail($id);
          $comment->delete();

          return redirect()->route('posts.show',['id'=> $comment->post->id])->with('message','Comment was deleted!');
    }
}
