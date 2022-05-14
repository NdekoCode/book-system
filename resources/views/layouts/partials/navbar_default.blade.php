<header class="border-bottom p-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap">
            <a href="{{ route('app_home') }}"
                class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none nav fs-4 me-auto fw-bold mb-2">
                {{ config('app.name') }}
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 mb-2">
                <li><a href="{{ route('app_home') }}" class="nav-link link-secondary px-2">Home</a></li>
                <li><a href="{{ route('app_about') }}" class="nav-link link-dark px-2">About</a></li>
                <li><a href="{{ route('app_contact') }}" class="nav-link link-dark px-2">Contact</a></li>
                <li><a href="{{ route('app_books') }}" class="nav-link link-dark px-2">Books</a></li>
                <li><a href="{{ route('app_authors') }}" class="nav-link link-dark px-2">Auteurs</a></li>

            </ul>

            <form class="col-12 col-lg-auto mb-lg-0 me-lg-3 mb-3">
                <input type="search" class="form-control" placeholder="Rechercher..." aria-label="Search">
            </form>
            @guest

                <div class="text-end-md text-center">
                    <button type="button"
                        class="mb-md-0 btn btn-outline-secondary me-2 border-secondary mb-2 border">Login</button>
                    <button type="button" class="mb-md-0 btn btn-warning mb-2">Sign-up</button>
                </div>
            @endguest
            @auth

                <div class="dropdown text-end ms-auto">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
