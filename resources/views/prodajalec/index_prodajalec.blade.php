@extends('prodajalec.layout.layout')

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>Odprta naročila</h3>

                <div class="row">
                    <div class="col-4">
                        <span>Račun</span>
                    </div>
                    <div class="col-4">
                        <span>Id. stranke</span>
                    </div>
                    <div class="col-4">
                        <span>Znesek</span>
                    </div>
                </div>
                @foreach($odprtiRacuni as $racun)
                    <div class="row">
                        <div class="col-4">
                            <a href="/prodaja/racuni/{{ $racun->id_racun }}">
                                <span>{{ $racun->id_racun }}</span>
                            </a>
                        </div>
                        <div class="col-4">
                            <span>{{ $racun->id_stranka }}</span>
                        </div>
                        <div class="col-4">
                            <span>{{ $racun->znesek }}</span>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-6">
                <h3>Zgodovina naročil</h3>
                <div class="row">
                    <div class="col-3">
                        <span>Datum</span>
                    </div>
                    <div class="col-3">
                        <span>Račun št.</span>
                    </div>
                    <div class="col-2">
                        <span>Id. stranke</span>
                    </div>
                    <div class="col-2">
                        <span>Znesek</span>
                    </div>
                    <div class="col-2">
                        <span>Stornacija</span>
                    </div>
                </div>

                @foreach($zgodovinaRacuni as $racun)
                    <div class="row">
                        <div class="col-3">
                            <a href="/prodaja/racuni/{{ $racun->id_racun }}"><span>{{ $racun->datum }}</span></a>
                        </div>
                        <div class="col-3">
                            <span>{{ $racun->id_racun }}</span>
                        </div>
                        <div class="col-2">
                            <span>{{ $racun->id_stranka }}</span>
                        </div>
                        <div class="col-2">
                            <span>{{ $racun->znesek }}</span>
                        </div>
                        <div class="col-2">
                            @if ( $racun->storniran_racun )
                                <span>{{ $racun->storniran_racun }}</span>
                            @else
                                <span>/</span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection