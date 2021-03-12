@extends('layouts.app')

@section('content')
       <h1>{{$question -> title}}の詳細ページ</h1>
       
       <div class="name">
               {!! Form::open() !!}
                        <div class="card">
                            <h6>カリキュラム名</h6>
                            <h3>{{$question -> title}}</h3>
                        </div>
                        
                         <div class="card">    
                             <h6>内容</h6>
                            <h3>{{$question -> content}}</h3>
                         </div>   
                         
                         <div class="card">    
                             <h6>答え</h6>
                            <h3>{{$question -> answer}}</h3>
                         </div>   
                         
                       {!! Form::model($question, ['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}   
                             {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}    
                       {!! Form::close() !!}                                           
           
                        {!! link_to_route('questions.edit', '編集',  ['question' => $question->id],['class' =>'btn btn-info']) !!}
                  {!! Form::close() !!}
        </div>
                         
        
        
@endsection