@extends("stranka.layout.layout")

@section("content")
    <h3>Vsebina košarice</h3>
    @forelse($items as $item)
            <div class="row">
                <div id="{{ $item["id_produkt"] }}" class="col-4 offset-2 cart-item">
                    <div>
                        {{ $item["naziv"] }}
                        <button class="btn btn-danger cancel"><i class="fas fa-times"></i></button>
                    </div>
                    <div>
                        <span>{{ $item["cena"] }} {{ $item["valuta"] }}</span>
                    </div>
                    <div>
                        <label for="kolicina">Količina</label>
                        <input type="number" value="{{ $item["kolicina"] }}" />
                        Skupaj:
                        <span class="price">{{ $item["kolicina"] * $item["cena"] }} {{ $item["valuta"] }}</span>
                    </div>

                </div>
            </div>
        @empty
            <h1>Prazna košarica!</h1>

        @endforelse
    <div class="col-3 offset-2">
        <a type="submit" class="btn btn-success" id="next" href="/kosarica/zakljucek">Nadaljuj z nakupom</a>
    </div>
@endsection
@section("script")
    <script src="{{ URL::asset("js/kosarica.js") }}"></script>
@endsection