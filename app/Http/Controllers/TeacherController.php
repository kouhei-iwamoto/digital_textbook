<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;
use App\User;

class TeacherController extends Controller
{
    public function show()
    {
        //教科書のモデル
        $texts = \Auth::user()->texts;
        return view('teacher.show',[
            'texts' => $texts,
        ]);
   }
   
  public function students()
  {
      $students = User::where('is_teacher', false)->get();
      return view('teacher.students', [
          'students' => $students,
      ]);
  }
 
    public function texts()
    {
        $texts = \Auth::user()->texts;
        return view('teacher.texts', [
            'texts' => $texts,
        ]);
    }
}
