@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src=" ['size' => 1000]) }}" alt="">
                </div>
            </div>
        </aside>
        
        @if (count($texts) > 0)
            <ul class="list-unstyled">
                @foreach ($texts as $text)
                    {{-- 投稿内容 --}}
                    <p class="mb-0">{!! nl2br(e($text->title)) !!}</p>
                           
                @endforeach
            </ul>
            {{-- ページネーションのリンク --}}
           {{-- {{ $microposts->links() }} --}}
        @endif

@endsection