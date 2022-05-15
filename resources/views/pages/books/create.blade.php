@extends('layouts.app',['tile' =>"Ajouter un nouveau livre"])
@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Ajouter un livre</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each
                    required form group has a validation state that can be triggered by attempting to submit the form
                    without completing it.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Informations sur l'Auteur</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Nombre de livres</h6>
                                <small class="text-muted">Vous avez 4 livres au total</small>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Nombre de followers</h6>
                                <small class="text-muted">Vous etes suivis par 4300 personnes</small>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Nombre de Following</h6>
                                <small class="text-muted">Vous suivez 200 personnes</small>
                            </div>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ajouter une promotion">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Details du livre</h4>
                    <form class="needs-validation" novalidate="" action="" method="post" class="mb-3"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="name" class="form-label">Nom du livre</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="name" placeholder="Titre du livre" value="{{ old('name') }}" name="name"
                                    required="">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm-6">
                                <label for="isbn" class="form-label">ISBN du livre</label>
                                <input type="text" class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}"
                                    id="isbn" placeholder="code ISBN du livre" value="{{ old('isbn') }}" name="isbn"
                                    required="">
                                @if ($errors->has('isbn'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('isbn') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="price" class="form-label">Prix du livre</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price"
                                        name="price" placeholder="Le prix du livre" value="{{ old('price') }}"
                                        required="">

                                    @if ($errors->has('price'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="author_id" class="form-label">Auteur du livre</label>
                                <select class="form-select {{ $errors->has('author_id') ? 'is-invalid' : '' }}"
                                    id="author_id" required="" name="author_id">
                                    <option value="" {{ old('author_id') ? '' : 'selected' }} disabled>Choisir un
                                        auteur...</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ old('author_id') === $author->id ? 'selected' : '' }}>
                                            {{ $author->firstname }}
                                            {{ $author->lastname }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('author_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('author_id') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Categorie du livre</label>
                                <select multiple
                                    class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                                    id="author_id" required="" name="category_id[]">
                                    <option value="" {{ old('category_id') ? '' : 'selected' }} disabled>Choisir la
                                        categorie...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') === $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('category_id') }}
                                    </div>
                                @endif
                            </div>

                            {{-- <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" id="state" required="">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div> --}}
                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Description du livre</label>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    id="description" cols="30" rows="5">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">Image de bord du livre</label>
                                <input type="file" name="image_desc"
                                    class="form-control {{ $errors->has('image_desc') ? 'is-invalid' : '' }}" />
                                @if ($errors->has('image_desc'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('image_desc') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <button class="w-100 btn btn-primary btn-lg mb-3" type="submit">Ajouter votre livre</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
