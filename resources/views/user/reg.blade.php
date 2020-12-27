@extends('layouts.main')

@section('content')
    <h1>Регистрация нового пользователя</h1>
    <form action="{{route('user::reg::form')}}" method="post">
        @csrf
        <p><i>Пожалуйста, заполните форму регистрации пользователей. Обязательные поля помечены </i><em>*</em></p>
        <fieldset>
            <legend>Контактная информация</legend>
            <label for="name">Фамилия <em>*</em></label>
            <input id="name" name="secondName" placeholder="Иванов" autofocus value="{{old('secondName')}}" required pattern="\S+[А-яа-я]">
            <br>
            <label for="name">Имя <em>*</em></label>
            <input id="name" name="firstName"  placeholder="Иван"  pattern="\S+[А-яа-я]">
            <br>
            <label for="name">Отчество</label>
            <input id="name" name="middleName" placeholder="Сидорович" pattern="\S+[А-яа-я]">
            <br>
            <label for="telephone">Телефон <em>*</em></label>
            <input id="telephone" name="telephone" placeholder="+7-903-955-55-55" >
            <br>
            <label for="email">Email <em>*</em></label>
            <input id="email" name="email" placeholder="email@server.com"  pattern="\S+@[a-z]+.[a-z]+">
            <br> </fieldset>
        <fieldset>
            <legend>Персональная информация</legend>
            <label for="age">Возраст<em>*</em></label>
            <input id="age" name="age" type="number"  min="14" max="100">
            <br>
            <label for="gender">Пол</label>
            <select id="gender">
                <option value="female">Мужской</option>
                <option value="male">Женский</option>
            </select>
            <br>
            <label for="comments">Перечислите дополнительную информацию, которую вы хотели бы сообщить о себе</label>
            <textarea id="comments"></textarea>
        </fieldset>
        <p>
            <input type="submit" value="Отправить информацию">
        </p>
    </form>
@endsection
