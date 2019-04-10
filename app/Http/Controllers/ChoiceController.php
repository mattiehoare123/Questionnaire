<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaires;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Question;
use App\Choice;

class ChoiceController extends Controller
{
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        /**This finds the id in the url that has been passed and then it will load with the view
        *so i can then store the hidden id of question_id
        */
        $question = Question::find($id);
        return view('choice.create')->with('question', $question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate( $request, [
            //This states that the choice is required as a question needs a choice
            'choice' => 'required',
          ]);
          //Get all fields from the form and put it into the $input variale using the $POST request
          $input = $request->all();
          //Call the user model to create a user using the $input array, adding the $question variable so i can get the id and pass it on
          $questionnaires = Choice::create($input);
          //Redirect to choice create view passing the question->id as this is required as a hidden field in this view
          return redirect()->back();
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
        //
        $choice = choice::findOrFail($id);

        return view('choice.edit', compact('choice'));
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
        //This states that the title is required and it must be a minumum of 3 characters long
        $this->validate( $request, [
          'choice' => 'required',
        ]);

      $choice = choice::findOrFail($id);
      //Call the update method which will store the editied record in the DB row
      $choice->update($request->all());
      /**
      *Redirect back to the question edit page by using the choice question_id to get the
      *question id to therefore go back to the correct edit page
      */
      return redirect('question/' . $choice->question_id . '/edit')->with('Edit_Choice', 'Choice Successfully Updated');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the choices id that matches $id
        $choice = choice::find($id);
        //Delete this row from the DB
        $choice->delete();
        //This redirects back to the same page where the request was made from with the message
        return redirect()->back()->with('Delete_Choice', 'Choice Deleted');
    }
}
