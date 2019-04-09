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
        //This finds the id in the url that has been passed and then it will load with the view
        //so i can then store the hidden id of question_id
        $question = Question::find($id);
        //$questionnaires = Questionnaires::pluck('id');//Get all the questionnaires id
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
            //This states that the title is required and it must be a minumum of 3 characters long
            'choice' => 'required',
          ]);

          $input = $request->all();

          $questionnaires = Choice::create($input);

          return redirect('/dashboard');
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
      /*Redirect back to the question edit page by using the choice question_id to get the
      question id to therefore go back to the correct edit page*/
      return redirect('question/' . $choice->question_id . '/edit');
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
        $choice = choice::find($id);

        $choice->delete();
        //This redirects back to the same page where the request was made from
        return redirect()->back();
    }
}
