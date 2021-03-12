@extends('layouts.app')

@section('content')

    <div>
        <h3>{{ $question -> title }}の編集ページ</h3>
    </div>
          
   <div class="row">
                <div class="col-12">
              {!! Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'put']) !!}  
                
                        <div class="form-group">
                            {!! Form::label('title', '新しいカリキュラム名:') !!}
                           {!! Form::text('title', null, ['class' => 'form-control']) !!} 
                        </div>
                        
                         <div class="form-group">    
                              {!! Form::label('content', '問題:') !!}   
                              {!! Form::textarea('content',null, ['class' => 'form-control']) !!}  
                         </div>   
                         
                         <div class="form-group">    
                              {!! Form::label('answer', '答え:') !!}   
                              {!! Form::text('answer',null, ['class' => 'form-control']) !!}  
                         </div>   
        
                        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                 {!! Form::close() !!}
                </div>
     </div>
                
            
@endsection