@extends('layouts.app')

@section('content')
    <h1>ここがcurriculums.showページです。</h1>

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
        
                     {!! Form::model($curriculum, ['route' => ['texts.delete', $curriculum->id], 'method' => 'delete']) !!}
                           {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    {!! link_to_route('curriculums.edit', '編集',  ['curriculum' => $curriculum->id],['class' =>'btn btn-info']) !!}
                 {!! Form::close() !!}
                </div>
          </div>
@endsection