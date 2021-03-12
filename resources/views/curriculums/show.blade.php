@extends('layouts.app')

@section('content')
        <h1>{{$curriculum -> title}}の詳細ページ</h1>
        
        <div class="name">
               {!! Form::open() !!}
                        <div class="card">
                            <h6>カリキュラム名</h6>
                            <h3>{{$curriculum -> title}}</h3>
                        </div>
                        
                         <div class="card">    
                             <h6>内容</h6>
                            <h3>{{$curriculum -> content}}</h3>
                         </div>   
                         
                         
                    {!! Form::model($curriculum, ['route' => ['curriculums.destroy', $curriculum->id], 'method' => 'delete']) !!}
                          {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
           
                    {!! link_to_route('curriculums.edit', '編集',  ['curriculum' => $curriculum->id],['class' =>'btn btn-info']) !!}
                 {!! Form::close() !!}
        </div>
        
            <h1>問題ページ</h1>
        <div class="card">
              @foreach ($questions as $question)  
                          {{-- テキストの名前 --}}             
                    <h2 class="mb-5">■■■■{!! nl2br(e($question->title)) !!}■■■■</h2>       
                 　 {!! link_to_route('questions.show', '詳細ページへ行く',  ['question' => $question->id],['class' =>'btn btn-info']) !!}     
             @endforeach         
            
             <a>{!! link_to_route('questions.create', '問題を作成する',  ['curriculum' => $curriculum->id],['class' =>'btn btn-danger']) !!}</a>          
          
       </div>   
@endsection