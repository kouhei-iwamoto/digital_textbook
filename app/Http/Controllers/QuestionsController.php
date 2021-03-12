<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //idでテキストを検索して取得
     $question = Question::find($id);
   //  $questions = $curriculum->questions()->get();
     
      return view('questions.show',[
        'question'=> $question,
   //   'questions' => $questions,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //idで指定されたcurriculumテーブルのデータを取得する。
        $question = Question::find($id);
        
        return view('questions.edit',[
        'question' => $question,
        
         ]);
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
      $question = Question::find($id);
       
      //タイトル更新
      $question->title = $request->title;
      $question->content = $request->content;
      $question->answer = $request->answer;
      $question->save();
      
      return redirect(route('questions.show', ['question' => $request->question]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $question = Question::find($id);
     
     $question->delete();
     
    return redirect('/teacher/texts');
    }
}