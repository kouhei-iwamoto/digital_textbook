<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\User;
use App\Curriculum;

class TextsController extends Controller
{
    public function show($id)
   {
     //idでテキストを検索して取得
     $text = Text::findOrFail($id);
     $curriculums = $text->curriculums()->get();
     
      return view('texts.show',[
       'textbook' => $text,
       'curriculums'=> $curriculums,
     ]);
   }
   public function edit($id)
   {
     //idで指定された教科書のページへ行く。
     $text = Text::find($id);

      return view('texts.edit',[
     'textbook' => $text,

     ]);
   }
   public function destroy($id)
   {
    //idで指定された教科書のページへ行く。
     $text = Text::find($id);
     
     $text->delete();
     
     return redirect('/teacher/texts');
   }
   
   public function update(Request $request, $id)
   {
      $text = Text::find($id);
      //タイトル更新
      $text->title = $request->title;
      $text->save();
      
      return redirect('/teacher/texts');
   }
   
   public function create()
   {
    $text = new Text;
    
    return view('texts.create', [
        'textbook' => $text,
     ]);
   }
   
   public function store(Request $request)
   {
      $text = new Text;
      $kouhei = new User;
  //  $is_teacher = Text::where('is_teacher', true)->get();
      //タイトル更新
      $text->title = $request->title;
      $text->user_id = 3;
      $text->save();
      
      return redirect('/teacher/texts');
   }
}
