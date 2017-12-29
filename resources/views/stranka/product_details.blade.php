@extends('layout.layout')

@section("content")
    <h1>{{ $product->naziv }}</h1>
    <p>{{ $product->opis }}</p>
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

    <button class="btn btn-success">V košarico</button>

    <div id="images" class="row">
        <div id="carouselImage" class="carousel slide col-md-6 offset-md-3" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($product->images as $image)
                    <div class="carousel-item {{ $loop->first ? "active": "" }}">
                        <img src="{{ $image->pot }}" alt="{{ $image->alias }}" class="d-block img-fluid" />
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#carouselImage" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselImage" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection