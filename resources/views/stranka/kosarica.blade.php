@extends("stranka.layout.layout")

@section("content")
    <h3>Vsebina košarice</h3>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            @forelse($items as $item)
                <div class="row">
                    <div id="{{ $item["id_produkt"] }}" class="col-12 col-md-8 offset-md-2 cart-item">
                        <div class="row">
                            <div class="col-6">
                                {{ $item["naziv"] }}
                                <button class="btn btn-danger cancel"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="col-6">
                                <label for="kolicina">Količina</label>
                                <input type="number" value="{{ $item["kolicina"] }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span>{{ $item["cena"] }} {{ $item["valuta"] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Prazna košarica!</h1>
            @endforelse

        </div>
    </div>
    <div class="row">
        <div class="col-3 col-md-2 offset-5 offset-md-4">
            <a class="btn btn-danger" href="/">Nadaljuj z nakupovanjem</a>
        </div>
        <div class="col-3 col-md-2">
            <a class="btn btn-success" id="next" href="/kosarica/zakljucek">Nadaljuj z naročilom</a>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ URL::asset("js/kosarica.js") }}"></script>
@endsection