@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <ul class="list-group shadow">
            @foreach ($categories as $category)
                <li class="list-group-item list-group-item-action">
                    <a class="text-decoration-none"
                        href="{{ route('app_category', $category->id) }}">{{ $category->title }}</a>
                </li>
            @endforeach

        </ul>
    </div>
@endsection
