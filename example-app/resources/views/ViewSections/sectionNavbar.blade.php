<!-- navigation block -->
<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">

        <!-- logo and link to home page   -->
        <a class="navbar-brand" href="/">
            <span style="color: Dodgerblue;">
                <i class="fa-brands fa-php fa-2xl"></i>
            </span>
        </a>

        <!-- navbar small button collapse menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Admin</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('guestbook.index')}}">GuestBook</a>
                    </li>

                @endauth
            </ul>

            <ul class="navbar-nav navbar-right">
                @auth()
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>

    </div>
</nav>
