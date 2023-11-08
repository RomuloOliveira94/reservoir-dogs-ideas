<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="/"><span class="fas fa-ban me-1 fs-3">
            </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('login') ? 'active' : ''}} fs-5" aria-current="page" href="{{route('login')}}">Entra!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('register') ? 'active' : ''}} fs-5" href="{{route('register')}}">Cadastra!</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('profile') ? 'active' : ''}}" href="{{route('profile')}}">{{Auth::user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post" >
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
