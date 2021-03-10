@extends('layouts.app')

@section('content')

    <div>
        <h3>{{ $curriculum -> title }}</h3>
        
        <h3>の編集ページ</h3> 
    </div>
          
   <div class="row">
                <div class="col-12">
              {!! Form::model($curriculum, ['route' => ['curriculums.update', $curriculum->id], 'method' => 'put']) !!}  
                
                        <div class="form-group">
                            {!! Form::label('title', '新しいカリキュラム名:') !!}
                           {!! Form::text('title', null, ['class' => 'form-control']) !!} 
                        </div>
                        
                         <div class="form-group">    
                              {!! Form::label('content', '本文:') !!}   
                              {!! Form::textarea('content',null, ['class' => 'form-control']) !!}  
                         </div>   
        
                        {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                 {!! Form::close() !!}
                </div>
     </div>
                
            
@endsection