<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = user::all();
        return view('admin/users/index')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/users/create');
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
        $this->validate($request, [
          //This states that the title is required and it must be a minumum of 3 characters long
          'name' => 'required',
          'email' => 'required|unique:users',
          'password' => 'required'
        ]);
        //Get all fields from the form and put it into the $input variale using the $POST request
        $input = $request->all();
        //Call the user model to create a user using the $input array
        user::create($input);
        //Redirect to this route using the $GET request which will be the admin/users/index
        return redirect('admin/users')->with('added', 'New user added');
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
        //Runs the find or fail if the $id is correct it will open with the edit view
        //passing along the $id variale with the compact function
        $user = user::findOrFail($id);

        return view('admin/users/edit', compact('user'));
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
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'password' => 'required'
        ]);

        $user = User::findOrFail($id);
        //Call the update method which will store the editied record in the DB row
        $user->update($request->all());
        //If this action has been successully it will redirect with this flash message to the users index view
        return redirect('admin/users')->with('updated', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Take the provided $id and find it in within the DB
      $user = user::find($id);
      //Once it is avaiable delete it and then redirect back to the admin users index
      $user->delete();

      return redirect('/admin/users');
    }
}
