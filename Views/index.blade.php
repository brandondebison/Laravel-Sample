<!DOCTYPE html>
<html >
    <head>
        <title>Wounds Canada</title>
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
        
            <div class="row mb-4">
                <div class="col-9 align-self-center">
                    <h2 class="mb-0">Best Practices PDFs</h2>
                </div>
                <div class="col-3">
                    <a href='/best_practices/create' class="btn btn-success btn-block btn-lg">Add new entry</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body mt-2">
                    @foreach($best_practices as $best_practice)
                    <div class="row mb-4">
                        <div class="col-8 align-self-center">
                            <h5 class="mb-0">{{$best_practice->title}}</h5>
                        </div>
                        <div class="col-2">
                            <a href='/best_practices/{{ $best_practice->id}}/edit' class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-2">
                            <a href='/best_practices/{{ $best_practice->id}}/destroy' class="btn btn-danger btn-block">Delete</a>
                        </div>
                    </div>
                    <hr /> 
                    @endforeach
                </div>
            </div>
        @endsection
    </body>
</html>
