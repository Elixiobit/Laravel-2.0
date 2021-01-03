@extends('layouts.main')

@section('content')
    <h1>{{$categories}}</h1>
    @foreach ($newsList as $newsOne)
        @php
        $url = route('news::one', ['id' => $newsOne['id']]);
        @endphp
        <div><a href='{{$url}}'><h1>{{$newsOne['title']}}</h1></a></div>
    @endforeach
@endsection
