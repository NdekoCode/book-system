@extends('layouts.app',['title'=>"Liste des auteurs"])
@section('content')
    <div class="container mt-5">

        <div class="text-end">
            <a href="{{ route('app_authorcreate') }}" class="btn btn-primary mt-2">Ajouter un auteur</a>
        </div>
        <div class="row justify-content-evenly">
            @forelse ($authors as $author)
                <div class="col-md-4 mb-3 p-3">
                    <div class="card rounded text-center shadow" style="min-height: 300px;">
                        <div class="card-img"><img src="{{ url($author->avatar) }}" class="img img-responsive w-100">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center align-items-center h-100">

                            <h2 class="profile-name my-2"><a
                                    href="{{ route('app_author', $author->id) }}">{{ $author->firstname }}
                                    {{ $author->lastname }}</a>
                            </h2>
                            <div class="profile-position">{{ $author->description }}</div>
                            <div class="mt-autp w-100 py-3">
                                <div class="row justify-content-evenly text-center">
                                    <div class="col-md-4">
                                        <h3>{{ count($author->books) }}</h3>
                                        <p>Livres</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>50</h3>
                                        <p>Followers</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>35</h3>
                                        <p>Objectifs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-infos">Pas d'auteur dans la base de donnée</div>
            @endforelse
        </div>
    </div>
@endsection
