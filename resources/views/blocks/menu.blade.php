<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <div class="collapse navbar-collapse inline" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <form class="inline"  action="{{route('language')}}" method="post">
                @csrf
                <select name="language" class="form-select option" aria-label="Default select example">
                    @foreach($language as $key => $item)
                        <option  value="{{$key}}"
                                @if($key == App::getLocale())
                                    selected
                                @endif
                        > {{$item}}</option>
                    @endforeach
                </select>
                <div class="bottom-lang ">
                    <button type="submit" class="btn btn-outline-dark">-></button>
                </div>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @foreach($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($item['alias'])}}">{{$item['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
