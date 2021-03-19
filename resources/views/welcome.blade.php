@extends('layouts.app')

@section('content')

@if(Auth::check())
    @if(Auth::user()->is_teacher)
        <h1>始めましょう！！{{ Auth::user()->name }}さん</h1>
    @else
        <div class="heloo">
            <script>
              (function() {
                var hour = (new Date).getHours();
                if (hour > 4 && hour < 11) {
                  document.write('おはようございます');
                }
                else if (hour > 10 && hour < 18) {
                  document.write('こんにちは');
                }
                else {
                  document.write('こんばんは');
                }
              })();
            </script>
         </div>
         <h3>教科書を選びましょう！{{ Auth::user()->name }}さん</h3>
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