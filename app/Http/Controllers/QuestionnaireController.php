<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaires;
use App\Question;
use App\Choice;
use App\User;

class QuestionnaireController extends Controller
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

    public function index($id)
    {
        //Find the questionnaire id that matches the $id
        $questionnaires = questionnaires::findOrFail($id);
        //->first() returns an collection where ->get() returns the element itself
        $question = Question::where('questionnaires_id',$id)->get();
        //Return the view with the two variables
        $number = 1;
        return view('questionnaire.index')->with('questionnaires', $questionnaires)->with('question', $question)->withnumber($number);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return the create a questionnaire view
        return view('questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        //This states that the title is required and it must be a minumum of 3 characters long
        'title' => 'required|min:3',
      ]);
      //Get all fields from the form and put it into the $input variale using the $POST request
      $input = $request->all();
      //Call the user model to create a user using the $input array
      $questionnaires = Questionnaires::create($input);
      /**
      *Redirect to this route using the $GET request which will be the question and it passing
      *the question->id which is needed in as a hidden field in that form
      */
      return redirect('question/' . $questionnaires->id . '/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Where the in Questionnaires table the id matches the $id get the first matcb
        $questionnaires = Questionnaires::where('id',$id)->first();
        //Where the in Question table the questionnaire_id matches the $id get all records so therefore ->get() is used instead of ->first()
        $question = Question::where('questionnaires_id',$id)->get();
        $i = 1;
        //Return the show view and instead of ->with('questionnaires', $questionnaires) i have used ->withQuestionnaires('$questionnaires') which are the same
        return view('questionnaire.show')->withQuestionnaires($questionnaires)->with('question', $question)->withi($i);
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
        *Runs the find or fail and if the $id is correct it will open with the edit view
        *passing along the $id variale with the compact function
        */
        $questionnaires = questionnaires::findOrFail($id);
        //Compact creates an array containing vairables and there values
        return view('questionnaire.edit', compact('questionnaires'));
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
        $this->validate($request, [
          //This states that the title is required and it must be a minumum of 3 characters long
          'title' => 'required|min:3',
        ]);
        $questionnaires = questionnaires::findOrFail($id);
        //Call the update method which will store the editied record in the DB row
        $questionnaires->update($request->all());
        //Return back to the correct questionnaire index page by adding $questionnares->id in the url
        return redirect('questionnaire/' . $questionnaires->id . '/index')->with('Edit_Title', 'Title Successfully Updated');
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
        $questionnaires = questionnaires::find($id);
        //Delete this questionnaire from the table
        $questionnaires->delete();
        //Return back to the page where the action was executed with this message
        return redirect()->back()->with('Questionnaire_Delete', 'Questionnaire Deleted');;;

    }
}
