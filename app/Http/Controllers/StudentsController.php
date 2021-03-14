<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\User;

class StudentsController extends Controller
{
    public function show() 
    {
    //教師が作ったテキスト？テキストなら何でもいいのでは…OK!表示できた。
      $texts = Text::orderBy('id', 'desc')->paginate(10);
      return view('students.show',[
       'texts' => $texts,
     ]);
    
    }
    
     public function texts()
      {
       $texts = Text::orderBy('id', 'desc')->paginate(10);
       return view('teacher.texts', [
        'texts' => $texts,
        ]);
      }
}
