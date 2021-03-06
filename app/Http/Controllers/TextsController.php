<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;

class TextsController extends Controller
{
    public function show($id)
   {
     //idでテキストを検索して取得
     $text = Text::find($id);

      return view('texts.show',[
       'textbook' => $text,

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
}
