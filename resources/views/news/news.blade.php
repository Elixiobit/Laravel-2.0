@extends('layouts.main')

@section('content')
    @if($newsOne)
        <h1>{{$newsOne['title']}}</h1>

    @endif
@endsection
