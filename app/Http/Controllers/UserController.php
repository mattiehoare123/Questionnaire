<?php

namespace App\Http\Controllers;
use Gate;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
  /*Secure the users pages to the admin*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        //
        if (Gate::allows('see_all_users')){

            $user = User::all();

            return view('admin/users/index', ['user' => $user]);
        }
        return view('/dashboard');
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
        // get the user
        $user = User::where('id',$id)->first();
        $roles = Role::all();

        // if user does not exist return to list
        if(!$user)
        {
            return redirect('/admin/users');
            // you could add on here the flash messaging of article does not exist.
        }
        return view('admin/users/edit')->with('user', $user)->with('roles', $roles);
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
        $user->update($request->all());

        $roles = $request->get('role');

        $user->roles()->sync($roles);

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

      return redirect('admin/users');
    }
}
