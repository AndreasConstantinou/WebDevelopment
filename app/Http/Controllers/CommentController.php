<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('comments.create');
    }

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

          //$comment->comment= $validatedData['comment'];
          $comment->comment= $request->message;
          $comment->user_id=\Auth::user()->id;
          $comment->post_id=$request->id;
          $comment->save();
          return response()->json($comment->comment);


    }

    public function post(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->message,
      );
      return response()->json($response);
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
