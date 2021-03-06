<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\Text;
use App\Question;

class CurriculumsController extends Controller
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
    public function create($id) // $idにルート定義の「texts/{id}/curriculums/create」の {id} が入ってくる
    {
    
    $curriculum = new Curriculum;
    // $text = new Text;
    // 引数の$idを使ってテキストを取得する。ログインユーザーの所有するTextに限定。
    $text = \Auth::user()->texts()->findOrFail($id);

    return view('curriculums.create', [
        'curriculum' => $curriculum,
        'text'       => $text,
     ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curriculum = new Curriculum;
        $curriculum->title = $request->title;
        $curriculum->content = $request->content;
        $curriculum->text_id = $request->text_id;
        $curriculum->save();
        
        return redirect(route('texts.show', ['id' => $request->text_id]));
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
     $curriculum = Curriculum::findOrFail($id);
     $questions = $curriculum->questions()->get();
     
      return view('curriculums.show',[
        'curriculum'=> $curriculum,
        'questions' => $questions,
       
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
        $curriculum = Curriculum::findOrFail($id);
        
        if ($curriculum->text->user_id != \Auth::id()) {
            abort(404);
        }
        
        return view('curriculums.edit',[
            'curriculum' => $curriculum,
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
       $curriculum = Curriculum::findOrFail($id);
       
      //タイトル更新
      $curriculum->title = $request->title;
      $curriculum->content = $request->content;
      $curriculum->save();
      
      return redirect(route('curriculums.show', ['curriculum' => $request->curriculum]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $curriculum = Curriculum::findOrFail($id);
     
     $curriculum->delete();
     
    return redirect('/teacher/texts');
    }
    
    public function answer(Request $request)
    {
        $curriculum = Curriculum::findOrFail($request->curriculum_id);
        $questions = $curriculum->questions()->get();
        
       // dd($request->answers);
        $isAllOk = true;
        foreach ($questions as $id => $question) {
            if ($request->answers[$question->id] != $question->answer) {
                // 不正解
                $isAllOk = false;
            }
        }
            
            if ($isAllOk) {
                // $$curriculum->text->id のテキストにリダイレクト
                 return redirect(route('curriculums.show', ['curriculum' => $curriculum->id]))->with('flash_message', '正解です。問題をしましょう！');
            }
            else {
               return redirect(route('curriculums.show', ['curriculum' => $curriculum->id]))->with('flash_message', '間違いです');
            }
        
    }
}
