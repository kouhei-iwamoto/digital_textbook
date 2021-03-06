<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;

class TextsController extends Controller
{
    public function show($id)
   {
     //idで指定された教科書のページへ行く。
     $text = Text::find($id);

      return view('texts.show',[
       'textbook' => $text,

     ]);
   }
}
