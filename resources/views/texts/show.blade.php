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
        
    {{--     @if (count($textbook) > 0)  --}}
            <ul class="list-unstyled">
                <div class="card">
    {{--          @foreach ($textbook as $kyokasho)  --}}
                    {{-- テキストの名前 --}}
                    <h2 class="mb-0">・{!! nl2br(e($textbook->title)) !!}</h2> 
     
                    <li class="dropdown-item">{!! link_to_route('texts.edit', '編集', ['id' => $textbook->id]) !!}</li>   
                    <li class="dropdown-item">{!! link_to_route('texts.delete', '削除', ['id' => $textbook->id]) !!}</li>
     {{--            @endforeach  --}}
                 </div>
            </ul>
            {{-- ページネーションのリンク --}}
           {{-- {{ $microposts->links() }} --}}
   {{--    @endif  --}}  
       
@endsection