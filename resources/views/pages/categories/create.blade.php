@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        <form class="needs-validation" novalidate="" action="" method="post" class="mb-3"
            enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title"
                        placeholder="Titre de la categorie" value="{{ old('title') }}" name="title" required="">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>


                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description de la category</label>
                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        id="description" cols="30" rows="5" maxlength="150">{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

            </div>
            <button class="w-100 btn btn-primary btn-lg mb-3" type="submit">Ajouter votre category</button>
        </form>
    </div>
@endsection
