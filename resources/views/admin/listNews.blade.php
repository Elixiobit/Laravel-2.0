@extends('layouts.mainAdmin')
@section('content')
    <h3>{{__('namePage.nameItem')}}</h3>
    @forelse($news as $oneNews)
        @php
        /**   @var $oneNews **/
            $url = route('admin::update', ['id' => $oneNews->id]);
        @endphp
        <div><a href='{{$url}}'><h1>{{$oneNews->tittle}}</h1></a></div> <br>
        <p>
            @php
                /**   @var $oneNews **/
                    $urlDelete = route('admin::delete', ['id' => $oneNews->id]);
            @endphp
            <a href="{{$urlDelete}}">
                <input type="submit" class="btn btn-danger" value="Удалить">
            </a>
        </p>
    @empty
        <h2>Пусто</h2>
    @endforelse
    @php
        $urlNew = route('admin::create');
    @endphp
    <p>
        <a href="{{$urlNew}}">
            <input class="btn btn-primary" type="button" value="Добавить новость">
        </a>
    </p>
    {{$news->links('vendor.pagination.bootstrap-4')}}

@endsection
