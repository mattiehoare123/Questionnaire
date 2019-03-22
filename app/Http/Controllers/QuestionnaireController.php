<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaires;
use App\Question;
use App\Choice;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questionnaires = questionnaires::all();//Get all the questionnaires
        $question = question::all();
        $choice = choice::all();
        return view('questionnaire.index')->with('questionnaires', $questionnaires)->with('question', $question)->with('choice', $choice);
    }

  /*  Route::get('/questionnaire/dashboard'), function () {
        return view('questionnare.dashboard');
    });
*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $input = $request->all();

        Questionnaires::create($input);

        return redirect('/question/create');;

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
        $questionnaires = questionnaires::findOrFail($id);

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
        //
        $questionnaires = questionnaires::findOrFail($id);
        //Call the update method which will store the editied record in the DB row
        $questionnaires->update($request->all());

        return redirect('questionnaire/');
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
