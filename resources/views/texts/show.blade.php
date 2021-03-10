@extends('layouts.app')

@section('content')
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
    {{--     @if (count($textbook) > 0)  --}}
            <ul class="list-unstyled">
                <div class="card">
    {{--          @foreach ($textbook as $kyokasho)  --}}
                    {{-- テキストの名前 --}}
                    <h2 class="mb-0">・{!! nl2br(e($textbook->title)) !!}</h2> 
     
                    <li class="dropdown-item">{!! link_to_route('texts.edit', '編集', ['id' => $textbook->id]) !!}</li>   
                     
                     {{-- Formファザードで作成する。--}}
                     {!! Form::model($textbook, ['route' => ['texts.delete', $textbook->id], 'method' => 'delete']) !!}
                           {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                     {!! Form::close() !!}
     {{--            @endforeach  --}}
                 </div>
            </ul>
            {{-- ページネーションのリンク --}}
           {{-- {{ $microposts->links() }} --}}
   {{--    @endif  --}}  
            <div class="card">
              @foreach ($curriculums as $curriculum)  
                    {{-- テキストの名前 --}}
                    <h2 class="mb-5">■■■■{!! nl2br(e($curriculum->title)) !!}■■■■</h2> 
                 　 <a>{!! link_to_route('curriculums.show', '詳細ページへ行く',  ['curriculum' => $curriculum->id],['class' =>'btn btn-info']) !!}</a> 
              @endforeach  
            
            
          <a>{!! link_to_route('curriculums.create', 'curriculumを作成する',  ['id' => $textbook->id],['class' =>'btn btn-danger']) !!}</a> 
          
          </div>
        </div>
@endsection