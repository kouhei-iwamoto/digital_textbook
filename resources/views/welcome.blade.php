@extends('layouts.app')

@section('content')

@if(Auth::check())
    @if(Auth::user()->is_teacher)
        <h1>始めましょう！！{{ Auth::user()->name }}さん</h1>
    @else
        <h1>こんにちは学生さん</h1>
    @endif
      
@else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
@endif
@endsection