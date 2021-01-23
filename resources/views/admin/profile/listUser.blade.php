@extends('layouts.main')

@section('content')
    <h1>Список пользователей</h1><br>
    @forelse($usersList as $user)

        @php
        /** @var  $user */
            $url = route('admin::profile::update', ['id' => $user->id]);
        @endphp

        <div><a href='{{$url}}'><h1>{{$user->name}}</h1></a></div> <br>
        <p>
            @php
                /**   @var $user **/
                    $urlDelete = route('admin::profile::delete', ['id' => $user->id]);
            @endphp
            <a href="{{$urlDelete}}">
                <input type="submit" class="btn btn-danger" value="Удалить">
            </a>
        </p>
    @empty
        <h2>Пусто</h2>
    @endforelse
    @php
        $urlUser = route('admin::profile::register');
    @endphp
    <p>
        <a href="{{$urlUser}}">
            <input class="btn btn-primary" type="button" value="Добавить пользователя">
        </a>
    </p>
    {{$usersList->links('vendor.pagination.bootstrap-4')}}
@endsection
