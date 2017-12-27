@extends('layout.layout')

@section("content")
    <h2>Artikli</h2>
    @forelse ($products as $product)
        @if ($loop->index % 3 == 0)
            <div class="row">
        @endif
        <div class="col-12 col-md-6 col-lg-4" id="{{ $product->id }}">
            <h4 class="clickable">{{ $product->naziv }}</h4>
            <p>{{ $product->opis }}</p>
            <p>{{ $product->currentPrice()->cena }} {{ $product->currentPrice()->valuta }}</p>
            @foreach($product->images as $image)

                <img src="{{ $image->pot }}" alt="{{ $image->alias }}" class="img-fluid clickable"/>
                @break
            @endforeach
        </div>
        @if ($loop->index % 3 == 2 or $loop->last)
            </div>
        @endif
    @empty
        <p>Ni izdelkov!</p>
    @endforelse
@endsection