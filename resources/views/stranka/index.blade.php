@extends('layout.layout')

@section("content")
    <h2>Artikli</h2>
    @forelse ($products as $product)
        @if ($loop->index % 4 == 0)
            <div class="row">
        @endif
        <div class="col-12 col-md-6 col-lg-3" id="{{ $product->id_produkt }}">
            <h4 class="clickable">{{ $product->naziv }}</h4>
            <p>{{ $product->opis }}</p>
            <p>{{ $product->currentPrice()->cena }} {{ $product->currentPrice()->valuta }}</p>
            @foreach($product->images as $image)

                <img src="{{ $image->pot }}" alt="{{ $image->alias }}" class="img-fluid clickable"/>
                @break
            @endforeach
            <button class="btn btn-danger">V košarico</button>
        </div>
        @if ($loop->index % 4 == 3 or $loop->last)
            </div>
        @endif
    @empty
        <p>Ni izdelkov!</p>
    @endforelse
@endsection

@section("script")
    <script src="{{ URL::asset("js/index.js") }}"></script>
@endsection