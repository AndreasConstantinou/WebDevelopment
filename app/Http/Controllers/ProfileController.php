<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;


class ProfileController extends Controller
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
        return view('users.create');
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
        'jobTitle'=> 'nullable|max:300',
        'date_of_birth'=>'nullable|date',
        'phoneNumber'=>'nullable|numeric',
      ]);

      $profile = new Profile;
      $profile->jobTitle=$validatedData['jobTitle'];
      $profile->date_of_birth=$validatedData['date_of_birth'];
      $profile->phoneNumber=$validatedData['phoneNumber'];
      $profile->user_id=\Auth::user()->id;
      $profile->save();

      session()->flash('message','Profile was created!');
      return redirect()->route('users.show', ['id'=>$profile->user_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('users.show', ['profile'=> $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('users.edit', ['profile'=> $profile]);
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
        $profile = Profile::findOrFail($id);
        $validatedData =$request->validate([
        'jobTitle'=> 'nullable|max:300',
        'date_of_birth'=>'nullable|date',
        'phoneNumber'=>'nullable|numeric',
      ]);
      $profile->jobTitle=$validatedData['jobTitle'];
      $profile->date_of_birth=$validatedData['date_of_birth'];
      $profile->phoneNumber=$validatedData['phoneNumber'];
      $profile->user_id=\Auth::user()->profile->id;
      $profile->save();

      session()->flash('message','Profile was updated!');
      return redirect()->route('users.show', ['id'=>$profile->user_id ]);
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
