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
        
        <h5>{{ $textbook -> title }}</h5>
        
         <h5>の教科書名編集ページ</h5> 
          
           
           <div class="row">
                <div class="col-12">
                 {!! Form::model($textbook, ['route' => ['texts.update', $textbook->id], 'method' => 'put']) !!}   
        
                        <div class="form-group">
                            {!! Form::label('title', '新しい教科書名:') !!}
                           {!! Form::text('title', null ,['class' => 'form-control']) !!} 
                        </div>
        
                        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                        
                  {!! Form::close() !!}
                </div>
          </div>
    </div>

                
            
@endsection