@extends('layouts.main')

@section('content')
    @if($newsOne)
        <h1>{{$newsOne->tittle}}</h1><br>
        <p>{{$newsOne->content}}</p><br>
    @endif
@endsection
