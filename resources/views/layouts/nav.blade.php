<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/united/bootstrap.min.css" />
    <!-- poppins font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            color: white;
            background-color: #12141c;
            font-family: "Poppins", sans-serif;
        }

    </style>
    <title>Main Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BRS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('AllHomePage') }}">Main Page</a>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                @if (auth()->user() and Auth::user()->is_librarian)
                                    <span>-Librarian</span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                {{-- different nav tags --}}
                {{-- extened reader navbar --}}
                @if (auth()->user() and ! Auth::user()->is_librarian )
                    <form action="{{route('borrows.index')}}" method="POST" class="nav-item nav-link">
                        @csrf
                        @method('GET')
                        <button class="border-0" type="submit">Rental List</button>
                    </form>
                @endif
                {{-- extended librarian navbar --}}
                @if (auth()->user() and Auth::user()->is_librarian)
                    {{-- <a class="nav-item nav-link" href="">Rental List</a> --}}
                    <form action="{{ route('borrows.index',['user'=>Auth::user()]) }}" method="POST" class="nav-item nav-link">
                        @csrf
                        @method('GET')
                        <button class="border-0" type="submit">Rental List</button>
                    </form>
                    <form action="{{route('books.create')}}" method="POST" class="nav-item nav-link">
                        @csrf
                        @method('GET')
                        <button class="border-0" type="submit">Add Book</button>
                    </form>
                    <form action="{{route('genres.index')}}" method="POST" class="nav-item nav-link">
                        @csrf
                        @method('GET')
                        <button class="border-0" type="submit"> Genere List</button>
                    </form>
                    {{-- <a class="nav-item nav-link" href="">Genere List</a> --}}
                @endif
            </div>
        </div>

    </nav>
    @yield('content')



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
