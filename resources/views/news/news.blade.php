@extends('layouts.main')

@section('content')
    @if($newsOne)
        <h1>{{$newsOne['title']}}</h1>
        <p>{{$newsOne['content']}}</p>

    @endif
@endsection
