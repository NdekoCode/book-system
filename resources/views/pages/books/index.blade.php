@extends('layouts.app')
@section('content')
    <div class="shop-product-wrap with-pagination row space-db--30 shop-border mt-5 grid">
        @forelse ($books as $book)
            <div class="col-lg-4 col-sm-6">
                <div class="product-card mb-5 rounded p-3 shadow">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                Book Categorie
                            </a>
                            <h3><a href="{{ route('app_book', $book->id) }}">{{ $book->name }}</a></h3>

                            <article class="book-detail-hover">
                                <p>{{ $book->description }}</p>
                                <p>Par <strong>{{ $book->author->firstname }} {{ $book->author->lastname }}</strong></p>
                            </article>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{ $book->image_desc }}" alt="{{ $book->name }}"
                                    style="width:100%;height:auto;">
                                <div>
                                    Book detai button eg.add-to-card
                                </div>
                            </div>
                            <div class="price-block d-flex justify-content-between">
                                <span class="price"><strong>{{ $book->price }}€</strong></span>
                                <span class="price-discount">Reduction: 20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Pas de livre disponible
            </div>
        @endforelse
    </div>
@endsection
