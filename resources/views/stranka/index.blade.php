@extends('stranka.layout.layout')

@section("content")
    <h2>Artikli</h2>
    @forelse ($products as $product)
        @if ($loop->index % 4 == 0)
            <div class="row">
        @endif
        <div class="col-12 col-md-6 col-lg-3" id="{{ $product->id_produkt }}">
            <h4 class="clickable">{{ $product->naziv }}</h4>
            <p>{{ $product->currentPrice()->cena }} {{ $product->currentPrice()->valuta }}</p>

            <span>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($product->povprecna_ocena >= $i)
                        <i class="fas fa-star fa-2x"></i>
                    @else
                        <i class="far fa-star fa-2x"></i>
                    @endif
                @endfor
                <p>{{ $product->povprecna_ocena }}</p>
            </span>

            @foreach($product->images as $image)

                <img src="{{ $image->pot }}" alt="{{ $image->alias }}" class="img-fluid clickable"/>
                @break
            @endforeach

            @if (session()->has("userId"))
                <button class="btn btn-danger add-to-cart">V košarico</button>
            @endif
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