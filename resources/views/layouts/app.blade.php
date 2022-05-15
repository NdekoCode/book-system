    @include('layouts.partials.header')
    <div class="container">
        <div class="alert alert-success mt-1">{{ session('success') }}</div>
    </div>
    @yield('content')
    @include('layouts.partials.footer')
