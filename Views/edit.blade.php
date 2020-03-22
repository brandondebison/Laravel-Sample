<!DOCTYPE html>
<html >
    <head>
        <title>Best Practice Edit</title>
    </head>

    <body>
        @extends('layouts.app')
        @section('content')
        <div class="card">
            <div class="card-header"><h4> Edit</h4></div>
            <div class="card-body">
                {!! Form::model($best_practice, ['route' => ['best_practices.update', $best_practice->id], 'method' => 'patch']) !!}

                {!! Form::label('title','Title:') !!}
                {!! Form::text('title', null, ['required'=>'required', 'class'=>'form-control']) !!}
                <br/><br/>
                {!! Form::submit('Save', ['class'=>'form-control btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
        @endsection
    </body>
</html>
