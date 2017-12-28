@extends('layout.layout')

@section("content")
    <h1>{{ $product->naziv }}</h1>
    <p>{{ $product->opis }}</p>
    <p>{{ $product->currentPrice()->cena }} {{ $product->currentPrice()->valuta }}</p>
    @foreach ($product->images as $image)
        <img src="{{ $image->pot }}" alt="{{ $image->alias }}" class="img-fluid" />
    @endforeach
@endsection