@extends('layouts.app')

@section('content')
    
        
        <div class="row">
                <div class="col-12">
                {!! Form::model($question, ['route' => ['questions.store']]) !!}
                    {!! Form::hidden('curriculum_id', $curriculum->id) !!}
                        <div class="form-group">
                            {!! Form::label('title', '新しいカリキュラム名:') !!}
                           {!! Form::text('title', null, ['class' => 'form-control']) !!} 
                        </div>
                        
                         <div class="form-group">    
                              {!! Form::label('content', '問題:') !!}   
                              {!! Form::textarea('content', null, ['class' => 'form-control']) !!}  
                         </div>   
                         
                         <div class="form-group">    
                              {!! Form::label('answer', '回答:') !!}   
                              {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}  
                         </div>   
        
                        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                 {!! Form::close() !!}
                </div>
          </div>
@endsection