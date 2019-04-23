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
      if (Gate::allows('see_all_users')) {
        $user = User::all();
        return view('admin.users.index')->with('user', $user);
      }
      /**
       * When using return view(/dashboard) it returned the view with no variables so therefore the view was not displaying correctly
       *so therefore i have redireted to the dashboard index method which passes through the variables
       */
      return redirect()->action('DashboardController@index');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Show the create form with roles variable so the admin can provide user with a role
        $roles = Role::all();

        //If user does not exist return to list of users

        return view('admin/users/create')->with('roles', $roles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *All fields in the form are required in order to create a user and there can be no same
         *email within the table as this is unqiue
         */
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|unique:users',
          'password' => 'required'
        ]);
        //Get all fields from the form and put it into the $input variale using the $POST request
        $input = $request->all();
        //Call the user model to create a user using the $input array
        user::create($input);
        //Redirect to this route using the $GET request which will be the admin/users/index
        return redirect('admin/users')->with('added', 'New User Added');
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
      /**
       *The variable user is equal to the User table where the user's id
       *matches the $id being passed through then it gets the data and displays it in the form.
       *The roles variable gets all the roles that are in that table.
       */
        $user = User::where('id',$id)->first();
        $roles = Role::all();

        //If user does not exist return to list of users
        if(!$user)
        {
            return redirect('/admin/users');
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
        //All fields in the form are required in order to create a user
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'password' => 'required'
        ]);
        /**
         *Find the $id that has been passed in the url and get all the
         *
         */
        $user = User::findOrFail($id);
        $user->update($request->all());

        $roles = $request->get('role');

        $user->roles()->sync($roles);

        //If this action has been successully it will redirect with this flash message to the users index view
        return redirect('admin/users')->with('edit', 'User Successfully Edited');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Take the provided $id from the url and then find it in within the DB
      $user = user::find($id);
      /**
      *When the id is avaiable delete it and then redirect back to the admin users index with
      *the message that the user has been deleted
      */
      $user->delete();

      return redirect('admin/users')->with('delete', 'User Deleted');
    }
}
