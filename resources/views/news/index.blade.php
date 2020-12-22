@extends('layouts.main')

@section('content')
    @foreach ($categories as $id => $category)
        @php
        $url = route('news-directories').'/'.$id;
        @endphp
       <div><a href='{{$url}}'>{{$category}}</a></div>
    @endforeach
@endsection
