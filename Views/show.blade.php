<!DOCTYPE html>
<html >
    <head>
        <title>Wounds Canada / Best Practices</title>
    </head>
</html>
@php
   $total = \App\BestPractice::all();
   $counter = 1;
@endphp
{"status": "true","message": "Best Practices Data fetched successfully!","data": [
    @foreach($best_practices as $best_practice) 
    {"id": "{{$best_practice->id}}",
    "title": "{{$best_practice->title}}",
    "fileName": "{{$best_practice->fileName}}",
    "version_id": "{{$best_practice->version_id}}"}@php if($counter < $total->count()) :@endphp,@php endif; $counter = $counter + 1; @endphp 
    @endforeach
]}
