@extends('prodajalec.layout.layout')


@section("content")
    <div class="container-fluid">
        <h1>Produkti</h1>
        <div class="row">
            <div class="col-2">
                Številka produkta
            </div>
            <div class="col-2">
                Naziv
            </div>
            <div class="col-2">
                Cena €
            </div>
            <div class="col-2">
                Aktiven
            </div>
        </div>
        @foreach ($izdelki as $izdelek)
            <div class="row">
                <div class="col-2">
                    <a class="btn btn-outline-success" href="/prodaja/izdelki/{{ $izdelek->id_produkt }}">
                        {{ $izdelek->id_produkt }}
                    </a>
                </div>
                <div class="col-2">
                    {{ $izdelek->naziv }}
                </div>
                <div class="col-2">
                    {{ $izdelek->currentPrice()->cena }}
                </div>
                <div class="col-2">
                    {{ $izdelek->aktiviran ? "Da" : "Ne" }}
                </div>
            </div>
        @endforeach

        <a href="/prodaja/izdelki/dodaj" class="btn btn-danger">Dodaj nov izdelek</a>
    </div>

@endsection