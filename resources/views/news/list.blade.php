@extends('layouts.main')

@section('content')
    <h1>{{$category->categories}}</h1><br>
    @forelse($newsList as $newsOne)

        @php
            $url = route('news::one', ['id' => $newsOne->id]);
        @endphp

        <div><a href='{{$url}}'><p>{{$newsOne->tittle}}</p></a></div> <br>
    @empty
        <h2>Пусто</h2>
    @endforelse
@endsection
