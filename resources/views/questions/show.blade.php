@extends('layouts.app')

@section('content')
       <h1>{{$question -> title}}の詳細ページ</h1>
       
       <div class="name">
               {!! Form::open() !!}
                        <div class="card">
                            <h6>カリキュラム名</h6>
                            <h3>{{$question -> title}}</h3>
                        </div>
                        
                         <div class="card">    
                             <h6>内容</h6>
                            <h3>{{$question -> content}}</h3>
                         </div>   
                         
                         <div class="card">    
                             <h6>答え</h6>
                            <h3>{{$question -> answer}}</h3>
                         </div>   
                  {!! Form::close() !!}
        </div>
                         
        
        
@endsection