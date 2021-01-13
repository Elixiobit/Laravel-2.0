@extends('layouts.mainAdmin')

@section('content')
    @if (session('success'))
        <div style="color:red">
            {{ session('success') }}
        </div>
    @endif
    <h1>{{$operation}}</h1>
    <form
        @if(!empty($oneNews))
        action="{{route('admin::update', ['id' => $oneNews->id])}}"
        @else
        action="{{route('admin::create')}}"
        @endif
        method="post">
        @csrf
        <label>
            <h4>Название новости</h4>
            <input name="tittle" value="{{$oneNews->tittle ?? ''}}" required>
        </label>
        <br>
        <label for="content">
            <h4>Описание</h4>
        </label>
        <textarea id="content" name="content" required>{{$oneNews->content ?? ''}}</textarea>
        <br>
        <label for="category">Категория</label>
        <select id="category" name="category_id" required>
            @foreach($categories as $category)
                <option
                    value="{{$category->id}}"
                    @if(!empty($oneNews) && ($oneNews->category_id == $category->id))
                    selected
                    @endif
                >
                    {{$category->categories}}
                </option>
            @endforeach
        </select>
        <br>
        <label for="source">Источник</label>
        <select id="source" name="source_id" required>
            @foreach($sources as $nameSource)
                <option
                    value="{{$nameSource->id}}"
                    @if(!empty($oneNews) && ($oneNews->source_id == $nameSource->id))
                    selected
                    @endif
                >
                    {{$nameSource->name_source}}
                </option>
            @endforeach
        </select>
        <br>
        <label for="publish_date">Дата публикации</label>
        <input id="publish_date" value='{{$oneNews->publish_date ?? ''}}' name="publish_date"
               @if(empty($oneNews))
               type="datetime-local"
               @endif
               required>
        <br>
        <h4>Новость активна?</h4>
        <label>Да
            <input name="active" type="radio" value="1"
                   @if(!empty($oneNews) && ($oneNews->active == 1))
                   checked
                @endif
            >
        </label>
        <label>Нет
            <input name="active" type="radio" value="0"
                   @if(!empty($oneNews) && ($oneNews->active == 0))
                   checked
                @endif
            >
        </label>
        <br>
        <p style="text-align: center">
            <input type="submit" value="Сохранить">
        </p>
    </form>
@endsection
