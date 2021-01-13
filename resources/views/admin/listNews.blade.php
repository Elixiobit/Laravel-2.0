@extends('layouts.mainAdmin')

@section('content')
    <h3>Срисок новостей</h3>
    @forelse($news as $oneNews)
        @php
            $url = route('admin::update', ['id' => $oneNews->id]);
        @endphp
        <div><a href='{{$url}}'><h1>{{$oneNews->tittle}}</h1></a></div> <br>
        <p>
            @php
                $urlDelete = route('admin::delete', ['id' => $oneNews->id]);
            @endphp
            <a href="{{$urlDelete}}">
                <input type="submit" value="Удалить">
            </a>
        </p>
{{--        <form action="{{route('admin::delete', ['id' => $oneNews->id])}}" method="post">--}}
{{--            @csrf--}}
{{--            <p style="text-align: center">--}}
{{--                <input type="submit" value="Удалить">--}}
{{--            </p>--}}
{{--        </form>--}}
    @empty
        <h2>Пусто</h2>
    @endforelse
    @php
        $urlNew = route('admin::create');
    @endphp
    <p>
        <a href="{{$urlNew}}">
            <input class="button" type="button" value="Добавить новость">
        </a>
    </p>
    {{$news->links('vendor.pagination.bootstrap-4')}}

@endsection
