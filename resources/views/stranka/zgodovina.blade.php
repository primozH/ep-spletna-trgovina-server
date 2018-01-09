@extends('stranka.layout.layout')


@section("content")
    <h2>Zgodovina nakupov</h2>
    <div class="row ">
        <div class="col-12 col-md-4">
            <h3>Odprta naročila</h3>
            <div class="row">
                <div class="col-4">
                    Datum
                </div>
                <div class="col-4">
                    Račun
                </div>
                <div class="col-4">
                    Znesek
                </div>
            </div>

            @forelse($odprt as $racun)
                <div class="row">
                    <div class="col-4"><a href="/racuni/{{ $racun->id_racun }}">
                        {{ $racun->datum }}
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="/racuni/{{ $racun->id_racun }}">
                        {{ $racun->id_racun }}
                        </a>
                    </div>
                    <div class="col-4">
                        {{ $racun->znesek }}
                    </div>
                </div>
            @empty
                <div class="row">

                    <div class="col-2 offset-5 alert alert-warning" role="alert">
                        Ni preteklih nakupov!
                    </div>
                </div>
            @endforelse
        </div>

        <div class="col-12 col-md-4">
            <h3>Potrjena naročila</h3>
            <div class="row">
                <div class="col-4">
                    Datum
                </div>
                <div class="col-4">
                    Račun
                </div>
                <div class="col-4">
                    Znesek
                </div>
            </div>

            @forelse($potrjen as $racun)
                <div class="row">
                    <div class="col-4"><a href="/racuni/{{ $racun->id_racun }}">
                            {{ $racun->datum }}
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="/racuni/{{ $racun->id_racun }}">
                            {{ $racun->id_racun }}
                        </a>
                    </div>
                    <div class="col-4">
                        {{ $racun->znesek }}
                    </div>
                </div>
            @empty
                <div class="row">

                    <div class="col-2 offset-5 alert alert-warning" role="alert">
                        Ni naročil!
                    </div>
                </div>
            @endforelse
        </div>

        <div class="col-12 col-md-4">
            <h3>Stornirana naročila</h3>
            <div class="row">
                <div class="col-4">
                    Datum
                </div>
                <div class="col-4">
                    Račun
                </div>
                <div class="col-4">
                    Znesek
                </div>
            </div>

            @forelse($storniran as $racun)
                <div class="row">
                    <div class="col-4"><a href="/racuni/{{ $racun->id_racun }}">
                            {{ $racun->datum }}
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="/racuni/{{ $racun->id_racun }}">
                            {{ $racun->id_racun }}
                        </a>
                    </div>
                    <div class="col-4">
                        {{ $racun->znesek }}
                    </div>
                </div>
            @empty
                <div class="row">

                    <div class="col-2 offset-5 alert alert-warning" role="alert">
                        Ni naročil!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection