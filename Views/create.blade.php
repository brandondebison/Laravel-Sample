@extends('layouts.app')

@section('content')
<style>

  /* === Upload Box === */
  .upload {
    margin: 10px;
    height: 85px;
    border: 8px dashed #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
  }

  .fa-file-pdf {
    padding-right: 4px;
    font-size: 25px;
    color: #ffffff;
}
</style>
<div class="container">

    <div class="card">
        <div class="card-header">Add Best Practices</div>

        <div class="card-body">
            {!! Form::open(['route' => ['best_practices.store'], 'files'=>true, 'enctype' => 'multipart/form-data']) !!}

            {!! Form::label('title','Title:') !!}
            {!! Form::text('title', null, ['required'=>'required', 'class'=>'form-control']) !!}
            <br/><br/>
            
            <div class="upload justify-content-start">
              <div class="m-3">
                <label for="file-upload" class="d-flex m-0">
                  <div class="btn btn-primary"><i class="far fa-file-pdf"></i> Browse</div>
                  <div id="upload-text" class="ml-2 align-self-center">No file chosen</div>
                </label>
                {{ Form::file('filename', ['id'=>'file-upload', 'hidden']) }}
              </div>
            </div>
            <br/><br/>
            {!! Form::submit('Create Best Practice', ['class'=>'form-control btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection