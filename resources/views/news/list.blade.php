@extends('layouts.main')

@section('content')
        <h1>{{$category->categories}}</h1><br>
    @forelse($newsList as $newsOne)
{{--        @php--}}{{-- вариант 1--}}
{{--        $url = route('news::one', ['news' => $newsOne->id]);--}}
{{--        @endphp--}}
        @php // вариант 2
            $url = route('news::one', ['id' => $newsOne->id]);
        @endphp
        <div><a href='{{$url}}'><h1>{{$newsOne->tittle}}</h1></a></div> <br>
    @empty
        <h2>Пусто</h2>
    @endforelse
@endsection
