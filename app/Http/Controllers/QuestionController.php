<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Questionnaires;
use App\Question;
use App\Choice;


class QuestionController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      //Find that $id that has been passed in the Questionnaires table
      $questionnaires = Questionnaires::find($id);
      //Return the view with the variable to use it as hidden field
      return view('question.create')->with('questionnaires', $questionnaires);

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
          //This states that the question is required and it must be a minumum of 5 characters long
          'question' => 'required|min:5',
          //If the question is required to submit the questionnaire
          'required' => 'required',
        ]);
        //Get all fields from the form and put it into the $input variale using the $POST request
        $input = $request->all();
        //Call the user model to create a user using the $input array, adding the $question variable so i can get the id and pass it on
        $question = Question::create($input);
        //Redirect to choice create view passing the question->id as this is required as a hidden field in this view
        return redirect('choice/' . $question->id . '/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $questionnaires = Questionnaires::where('id', $id);
      //Get the question data that matches the $id to display the title
      $question = Question::findorFail($id);
      //Gets all the choices that have the question_id same the $id passed for the user to answer
      $choice = Choice::where('question_id',$id)->get();
      //Return the view with the question title and choices
      return view('question.show')->with('questionnaires', $questionnaires)->with('question', $question)->with('choice', $choice);

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
       * Because i'm displaying the choices on the question edit view and i need to get
       * the choices where the question_id in the table matches the $id passed
       */
        $question = question::findOrFail($id);
        //Get the record in questionnaires where the user_id matches the current id logged in
        $choice = Choice::where('question_id',$id)->get();

        /*I tried to make only the user can edit their questionnaire but because i was using ->first this only got
        *the first questionnaire id record of the user so did not work as ->get() is not suitable in this case. How it worked was iff the questionnaires_id in the question is
        *not equal to the questionnaires id return back to the page,
        *$questionnaires = Questionnaires::where('user_id', Auth::id())->first();
        if($question->questionnaires_id !== $questionnaires->id)
        {
          return back();
        }
        */
        return view('question.edit', compact('question'))->with('choice', $choice);
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
        $this->validate( $request, [
          //This states that the title is required and it must be a minumum of 3 characters long
          'question' => 'required|min:5',
          'required' => 'required',
        ]);

        $question = question::findOrFail($id);
        //Call the update method which will store the editied record in the DB row
        $question->update($request->all());
        //Return back to the correct questionnaire index page by adding $questionnares->id in the url with the message
        return redirect('questionnaire/' . $question->questionnaires_id . '/index')->with('Edit_Question', 'Question Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //Find the questionnaire id in the table that matches $id
    $question = question::find($id);
    //Delete this questionnaire from the table
    $question->delete();
    //Return back to the page where the action was executed with this message
    return redirect('questionnaire/' . $question->questionnaires_id . '/index')->with('Question_Delete', 'Question Deleted');
    }
}
