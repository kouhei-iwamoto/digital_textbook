@extends('layouts.app')

@section('content')
@if(Auth::user()->is_teacher)
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 <まだ未実装　ラストに実装する。>--}}
                    <img class="rounded img-fluid" src=" ['size' => 1000]) }}" alt="">
                </div>
            </div>
        </aside>
        <div>
 

                <div class="card">
  
                        {{-- テキストの名前 --}}
                        <h2 class="mb-0">{!! nl2br(e($textbook->title)) !!}</h2> 
                
                         {!! link_to_route('texts.edit', '編集', ['id' => $textbook->id], ['class' =>'btn btn-info']) !!}
                         
                         {{-- Formファザードで作成する。--}}
                         {!! Form::model($textbook, ['route' => ['texts.delete', $textbook->id], 'method' => 'delete']) !!}
                              {!! Form::submit('削除', ['class' => 'btn btn-danger btn-block']) !!}
                         {!! Form::close() !!} 
                         
                </div>
                
    

            <div class="card">
              @foreach ($curriculums as $curriculum)  
                    {{-- テキストの名前 --}}
                    <h2 class="mb-5">■■■■{!! nl2br(e($curriculum->title)) !!}■■■■</h2> 
                 　 {!! link_to_route('curriculums.show', '詳細ページへ行く',  ['curriculum' => $curriculum->id],['class' =>'btn btn-info']) !!}
              @endforeach  
            
            
            {!! link_to_route('curriculums.create', 'curriculumを作成する',  ['id' => $textbook->id],['class' =>'btn btn-danger']) !!}
          
          </div>
        </div>
@else

 
            <ul class="list-unstyled">
                <div class="card">
 
                    {{-- テキストの名前 --}}
                    <h2 class="mb-0">・{!! nl2br(e($textbook->title)) !!}</h2> 
                </div>
            </ul>
            
            <div class="card">
              @foreach ($curriculums as $curriculum)  
                    {{-- テキストの名前 --}}
                    <h2 class="mb-5">■■■■{!! nl2br(e($curriculum->title)) !!}■■■■</h2> 
                 　 {!! link_to_route('curriculums.show', '詳細ページへ行く',  ['curriculum' => $curriculum->id],['class' =>'btn btn-info']) !!}
              @endforeach 
            </div>
                    
     
@endif
@endsection