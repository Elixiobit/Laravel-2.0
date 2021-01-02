@extends('layouts.main')

@section('content')
    @foreach ($categories as $id => $category)
        @php
            $url = route('news::listNews', ['categoryId' => $id]);
        @endphp
       <div><a href='{{$url}}'>{{$category['ru']}}</a></div>
    @endforeach
@endsection

