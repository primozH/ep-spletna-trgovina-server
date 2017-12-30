@extends("stranka.layout.layout")

@section("content")
    <div class="row">
        @forelse($items as $item)
            <div id="{{ $item["id"] }}">
                <span>{{ $item["naziv"] }}</span>
                <span>{{ $item["cena"] }}</span>
                <input type="number" value="{{ $item["kolicina"] }}" />
                <span><strong>{{ $item["kolicina"] * $item["cena"] }} {{ $item["valuta"] }}</strong></span>
                <button><i class="fas fa-times"></i></button>
            </div>
        @empty
            <h1>Prazna košarica!</h1>
        @endforelse
    </div>
@endsection