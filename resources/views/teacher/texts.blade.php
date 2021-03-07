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
        
        @if (count($texts) > 0)
            <ul class="list-unstyled">
                <div class="card">
                @foreach ($texts as $text)
                    {{-- 投稿内容 --}}
                    <h2 class="mb-0">{!! nl2br(e($text->title)) !!}</h2>
                    <a>{!! link_to_route('texts.show', '詳細',['id' => $text->id],['class' => 'btn btn-primary']) !!}</a> 
                @endforeach
                 </div>
            

            {{-- ページネーションのリンク --}}
           {{-- {{ $microposts->links() }} --}}
        @endif

        
         <a>{!! link_to_route('texts.create', '教科書を作成する', [],['class' =>'btn btn-danger']) !!}</a> 
        
            
@endsection