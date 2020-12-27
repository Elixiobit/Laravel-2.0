@extends('layouts.main')

@section('content')
    @foreach ($categories as $key => $category)
        @php
        $url = route('news-directories').'/'.$key;
        @endphp
       <div><a href='{{$url}}'>{{$category}}</a></div>
    @endforeach
@endsection
