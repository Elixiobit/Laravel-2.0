@extends('layouts.main')

@section('content')
    @if($newsOne)
        <h1>{{$nameRU}}</h1>
        @foreach($newsOne as $ro)
            <div><a href='{{route('news-directories').'/'.$name.'/'.$ro}}'>{{$ro}}</a></div>
        @endforeach
    @endif
@endsection
