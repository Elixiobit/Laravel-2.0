<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="inline" action="{{route('language')}}" method="post">
            @csrf
            <select name="language" class="form-select option" aria-label="Default select example">
                @foreach($language as $key => $item)
                    <option value="{{$key}}"
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @foreach($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($item['alias'])}}">{{__('nameMenu'.'.'.$item['title']) }}</a>
                    </li>
                @endforeach
                @guest
                    @if (Route::has('auth::login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth::login') }}">{{ __('nameMenu.login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a></li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('auth::logout') }}" method="POST">
                            <input class="nav-link logout" type="submit" value="{{ __('nameMenu.logout') }}">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
