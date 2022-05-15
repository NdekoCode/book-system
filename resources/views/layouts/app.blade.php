    @include('layouts.partials.header')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mt-1">{{ session('success') }}</div>
        @endif
    </div>
    @yield('content')
    @include('layouts.partials.footer')
