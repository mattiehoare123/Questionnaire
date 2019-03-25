<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index()
    {
        //
        $question = question::all();//Get all the questionnaires
        $choice = choice::all();

        return view('question.index')->with('question', $question)->with('choice', $choice);
        /*
        $question = DB::table('questions')->get();

       return view('question.index', ['question' => $question]);
       */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('question.create');
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
        $this->validate( $request, [
          //This states that the title is required and it must be a minumum of 5 characters long
          'question' => 'required|min:5',
          'required' => 'required',
        ]);

        $input = $request->all();

        Question::create($input);

        return redirect('/choice/create');
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
        $question = question::findOrFail($id);
        $choice = choice::all();

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
        //
        $this->validate( $request, [
          //This states that the title is required and it must be a minumum of 3 characters long
          'question' => 'required|min:5',
          'required' => 'required',
        ]);

        $question = question::findOrFail($id);
        //Call the update method which will store the editied record in the DB row
        $question->update($request->all());

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
        $question = question::find($id);

        $question->delete();

        return redirect('/questionnaire');
    }
}
