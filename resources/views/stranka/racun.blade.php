@extends("stranka.layout.layout")

@section("content")

    <div class="row">
        <div class="col-4 col-md-3">
            Številka računa <strong>{{ $racun->id_racun }}</strong>
        </div>
        <div class="col-12 col-md-6">
            <h1>Postavke računa</h1>
            <div class="row product-item">
                <div class="col-8">
                    <p>Naziv</p>
                </div>
                <div class="col-2">
                    <p>Količina</p>
                </div>
                <div class="col-2">
                    <p>Cena</p>
                </div>
            </div>
            @foreach($racun->invoiceItems as $item)
                <div class="row">
                    <div class="col-8">
                        <p>{{ $item->product->naziv }}</p>
                    </div>
                    <div class="col-2">
                        {{ $item->kolicina }}
                    </div>
                    <div class="col-2">
                        {{ $item->cena }} €
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-3 offset-9">
                    <strong>ZNESEK {{ $racun->znesek }} €</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ URL::asset("js/racun.js") }}"></script>
@endsection