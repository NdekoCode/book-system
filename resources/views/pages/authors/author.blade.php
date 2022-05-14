@extends('layouts.app',['title'=> $author->firstname.' '. $author->lastname])
@section('content')
    <div class="container">
        <section class="h-100 gradient-custom-2">
            <div class="h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-12">
                        <div class="card">
                            <div class="rounded-top d-flex flex-row text-white"
                                style="background-color: #000; height:200px;">
                                <div class="container">
                                    <div class="ms-4 d-flex flex-column mt-1" style="width: 150px;">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                            style="width: 150px; z-index: 1">
                                        <button type="button" class="btn btn-secondary" data-mdb-ripple-color="dark"
                                            style="z-index: 1;">
                                            Modifier le profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-4">

                                <div class="ms-3">
                                    <h5><strong>{{ $author->firstname }} {{ $author->lastname }}</strong></h5>
                                    <p>New York</p>
                                </div>
                                <div class="container">
                                    <div class="d-flex justify-content-end py-1 text-center">
                                        <div>
                                            <p class="h5 mb-1">{{ count($books) }}</p>
                                            <p class="small text-muted mb-0">Livres</p>
                                        </div>
                                        <div class="px-3">
                                            <p class="h5 mb-1">1026</p>
                                            <p class="small text-muted mb-0">Followers</p>
                                        </div>
                                        <div>
                                            <p class="h5 mb-1">478</p>
                                            <p class="small text-muted mb-0">Following</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="container">

                                    <div class="mb-5">
                                        <p class="lead fw-normal mb-1">A propos de l'Auteur</p>
                                        <div class="p-4" style="background-color: #f8f9fa;">
                                            <p class="font-italic mb-1">{{ $author->description }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="lead fw-normal mb-0">Livres recents</p>
                                        <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                                    </div>
                                    <div class="row">
                                        @forelse ($books as $book)
                                            <div class="col-md-6">
                                                <article class="card mb-3 rounded shadow">
                                                    <div class="card-header border-0 bg-white">

                                                        <h3><a
                                                                href="{{ route('app_book', $book->id) }}">{{ $book->name }}</a>
                                                        </h3>
                                                        <img src="{{ $book->image_desc }}" alt="{{ $book->name }}"
                                                            class="w-100 rounded-3 d-block img-fluid">
                                                    </div>

                                                    <div class="card-body">
                                                        <p>{{ $book->description }}</p>
                                                    </div>
                                                </article>
                                            </div>
                                        @empty
                                            <p class="alert alert-info">Pas de livre encore publier</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
