@extends('layouts.app',['title'=>$book->name])
@section('content')
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class="w-100 h-auto" src="{{ $book->image_desc }}" alt="{{ $book->name }}">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h2>{{ $book->name }}</h2>
                    </div>
                    <ul>
                        <li>
                            Auteur: <strong>{{ $book->author->firstname }} {{ $book->author->lastname }}</strong>
                            <em>{{ $book->author->description }}</em>
                        </li>
                        <li>Description: {{ $book->description }}</li>
                        <li><strong>Prix: {{ $book->price }}€</strong></li>
                        <li>Categorie: @forelse($categories as $cat)
                                <p><a
                                        href="#"><strong>{{ $cat->title }}</strong></a><br />Description:{{ $cat->description }}
                                </p>
                            @empty
                                <p>
                                    <a href="#" class="alert alert-info text-decoration-none px-2 py-1">Pas de categorie</a>
                                </p>
                            @endforelse
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <h1>Article similaires</h1>
        <div class="shop-product-wrap with-pagination row space-db--30 shop-border mt-5 grid">
            @forelse ($categories as $category)
                @forelse ($category->books as $relativeBook)
                    @if ($relativeBook->id !== $book->id)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card mb-5 rounded p-3 shadow">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        <li>Categorie:
                                            @forelse($relativeBook->categories as $cat)
                                                <a href="" class="author">
                                                    <strong>{{ $cat->title }}</strong>
                                                </a>
                                            @empty
                                                <a href="#" class="alert alert-info text-decoration-none px-2 py-1">Pas de
                                                    categorie</a>
                                            @endforelse
                                        </li>
                                        <h3><a
                                                href="{{ route('app_book', $relativeBook->id) }}">{{ $relativeBook->name }}</a>
                                        </h3>

                                        <article class="book-detail-hover">
                                            <p>{{ $relativeBook->description }}</p>
                                        </article>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ $relativeBook->image_desc }}" alt="{{ $relativeBook->name }}"
                                                style="width:100%;height:auto;">
                                            <div>
                                                Book detai button eg.add-to-card
                                            </div>
                                        </div>
                                        <div class="price-block d-flex justify-content-between">
                                            <span
                                                class="price"><strong>{{ $relativeBook->price }}€</strong></span>
                                            <span class="price-discount">Reduction: 20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @empty

                        <div class="alert alert-info">
                            Pas de livre disponible
                        </div>
                    @endforelse
                    @empty
                        <div class="alert alert-info">
                            Pas de livre disponible
                        </div>
                    @endforelse
                </div>

            </div>
        @endsection
