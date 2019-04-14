<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaires;
use App\Question;
use App\Choice;
use App\Response;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //This secures the response page
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get all the input from the view and eqaul it to $input
        $input = $request->all();
        //Store the $input data into the Respone table
        Response::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.zz
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //Find the questionnaire data that matches the $id being passed through
      $questionnaires = questionnaires::findOrFail($id);
      //Retrieve the questions where the questionnaire_id in the question table matches the $id
      $question = question::where('questionnaires_id', $id)->get();
      return view('responses.show')->with('questionnaires', $questionnaires)->with('question', $question);//If both variables find the correct data then load with the view
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
