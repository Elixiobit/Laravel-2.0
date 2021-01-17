@extends('layouts.main')

@section()
    <a href="#"><img src="/css/img/logo.svg" alt="logo"></a>
    <ul class="menu-top">
        @foreach($menu as $item)
            <li class="top-list1"><a href="{{route($item['alias'])}}" class="top-link">{{$item['tittle']}}</a></li>
        @endforeach
    </ul>

@endsection
