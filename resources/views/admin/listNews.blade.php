@extends('layouts.mainAdmin')

@section('content')
    <h3>Срисок новостей</h3>
    @forelse($news as $oneNews)
        @php
            $url = route('admin::update', ['id' => $oneNews->id]);
        @endphp
        <div><a href='{{$url}}'><h1>{{$oneNews->tittle}}</h1></a></div> <br>
    @empty
        <h2>Пусто</h2>
    @endforelse
    @php
        $urlNew = route('admin::create');
    @endphp
    <p>
        <a href="{{$urlNew}}">
            <input class="button" type="button"  value="Добавить новость">
        </a>
    </p>
    {{$news->links('vendor.pagination.bootstrap-4')}}

@endsection
