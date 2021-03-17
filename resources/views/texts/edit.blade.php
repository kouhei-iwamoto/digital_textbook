@extends('layouts.app')

@section('content')


    <div>
        <h5>{{ $textbook -> title }}</h5>
    </div>
        

           
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