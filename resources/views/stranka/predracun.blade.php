@extends("stranka.layout.layout")

@section("content")
    <h3>Predračun</h3>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    Izdelek
                </div>
                <div class="col-3">
                    Cena (€)
                </div>
                <div class="col-3">
                    Količina
                </div>
                <div class="col-3">
                    Skupaj
                </div>
            </div>
        </div>
    </div>
    @forelse($items as $item)
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        {{ $item["naziv"] }}
                    </div>
                    <div class="col-3">
                        {{ $item["cena"] }}
                    </div>
                    <div class="col-3">
                        {{ $item["kolicina"] }}
                    </div>
                    <div class="col-3">
                        {{ $item["cena"] * $item["kolicina"] }}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h1>Ni elementov</h1>

    @endforelse

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3 offset-9">
                    Za plačilo: <strong>{{ $sum }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3 offset-9">
                    <button type="submit" class="btn btn-success" id="next">Oddaj naročilo</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ URL::asset("js/predracun.js") }}"></script>
@endsection