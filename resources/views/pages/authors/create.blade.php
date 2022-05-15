@extends('layouts.app', ['title' =>"Ajouter un nouvel auteur"])
@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Ajouter un nouvel auteur</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each
                    required form group has a validation state that can be triggered by attempting to submit the form
                    without completing it.</p>
                @if (session('email'))
                    <div class="alert alert-danger">{{ session('email') }}</div>
                @endif
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-12 col-lg-6">
                    <h4 class="mb-3">Ajouter un auteur</h4>
                    <form class="needs-validation" novalidate="" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">Prenom</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                                    id="firstname" placeholder="Prenom de l'auteur" value="{{ old('firstname') }}"
                                    name="firstname" required="">
                                @if ($errors->has('firstname'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('firstname') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">Nom</label>
                                <input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                                    id="lastname" placeholder="Nom de l'auteur" value="{{ old('lastname') }}"
                                    name="lastname" required="">
                                @if ($errors->has('lastname'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('lastname') }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="col-12 mb-3">
                            <label for="firstname" class="form-label">Adresse email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                id="email" placeholder="Email de l'auteur" value="{{ old('email') }}" name="email"
                                required="">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-12 mb-3">

                            <label for="birthday" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                                id="birthday" placeholder="Date de naissance de l'auteur" value="{{ old('birthday') }}"
                                name="birthday" required="">
                            @if ($errors->has('birthday'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('birthday') }}
                                </div>
                            @endif
                        </div>
                        <div class="row g-3">

                            <div class="col-md-7 mb-3">
                                <label for="description" class="form-label">A propos de l'auteur</label>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    id="description" cols="30" rows="5"
                                    placeholder="Une petite biographie ou un petit descriptif à propos de l'auteur">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="description" class="form-label">Photos de profile</label>
                                <input type="file" name="avatar"
                                    class="form-control {{ $errors->has('avatar') ? 'is-invalid' : '' }}" />
                                @if ($errors->has('avatar'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('avatar') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button class="w-100 btn btn-primary btn-lg mb-3" type="submit">Ajouter votre livre</button>
                    </form>

                </div>
                <div class="col-lg-6 rounded-3 d-none d-lg-block shadow"
                    style="min-height: 500px;background:linear-gradient(45deg,rgba(0,0,0,0.3) 15% ,rgba(0,0,0,0.5)), url('{{ asset('img/authors.jpg') }}') no-repeat center center / cover;"
                    style="">
                </div>
            </div>
    </div>
    </main>
    </div>
@endsection
