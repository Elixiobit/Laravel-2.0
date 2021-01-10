@extends('layouts.main')

@section('content')

    @foreach ($categories as $category)
        @php
            $url = route('news::listNews', ['categories' => $category->id]);
        @endphp
       <div><a href='{{$url}}'>{{$category->categories}}</a></div>
    @endforeach
@endsection

