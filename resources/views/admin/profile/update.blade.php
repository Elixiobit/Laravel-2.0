@extends('layouts.mainAdmin')

{{--@section('title')--}}
{{--    Админка.Профиль--}}
{{--@endsection--}}

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Профиль пользователя</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin::profile::update', ['id' => $user->id])}}" method="post"
                  name="{{$user->email}}">
                @csrf
                <div class="form-group">
                    <label>Имя</label>
                    <input class="form-control" type="text" name="name"
                           value="{{$user->name ?? old('name')}}">
                </div>
                <div class="form-group">
                    <label>Имэил</label>
                    <input class="form-control" type="email" name="email"
                           value="{{$user->email ?? old('email')}}">
                </div>
                <div class="form-group">
                    <label>Текущий пароль</label>
                    <input class="form-control" type="password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isAdmin"
                           id="flexRadioDefault1"
                           value="1"
                           @if($user->is_admin == 1)
                           checked
                        @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                        {{ __('Administrator') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isAdmin"
                           id="flexRadioDefault2"
                           value="0"
                           @if($user->is_admin == 0)
                           checked
                        @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                        {{ __('User') }}
                    </label>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection

