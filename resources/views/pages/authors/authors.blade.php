@extends('layouts.app',['title'=>"Liste des auteurs"])
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-evenly">
            @forelse ($authors as $author)
                <div class="col-md-4 mb-3 p-3">
                    <div class="card rounded text-center shadow">
                        <div class="card-img"><img
                                src="http://envato.jayasankarkr.in/code/profile/assets/img/profile-6.jpg"
                                class="img img-responsive w-100">
                        </div>
                        <div class="card-body">

                            <h2 class="profile-name my-2"><a
                                    href="{{ route('app_author', $author->id) }}">{{ $author->firstname }}
                                    {{ $author->lastname }}</a>
                            </h2>
                            <div class="profile-position">{{ $author->description }}</div>
                            <div class="profile-overview">
                                <div class="profile-overview">
                                    <div class="row d-flex justify-content-evenly text-center">
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
                </div>
            @empty
                <div class="alert alert-infos">Pas d'auteur dans la base de donnée</div>
            @endforelse
        </div>
    </div>
@endsection
