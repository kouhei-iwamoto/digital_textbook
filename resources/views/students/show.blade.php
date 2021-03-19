@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ Auth::user()->name }}</h3>
                </div>
            </div>
        </aside>
    </div>

    
     {{--  @if (count($texts) > 0)   --}}
            <ul class="list-unstyled">
                <div class="card">
               @foreach ($texts as $text) 
                    {{-- 投稿内容 --}}
                    <h2 class="mb-0">・{!! nl2br(e($text->title)) !!}</h2>
                    
                @endforeach   
                 </div>
            </ul>
            
   {{--  @endif    --}}
       
@endsection