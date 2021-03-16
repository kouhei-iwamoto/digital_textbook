@extends('layouts.app')

@section('content')

    @foreach ($students as $student) 
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h6>名前</h6>
                        <h3 class="card-title">{{ $student->name}}</h3>
                    </div>
                </div>
            </aside>
        </div>
    @endforeach 

@endsection