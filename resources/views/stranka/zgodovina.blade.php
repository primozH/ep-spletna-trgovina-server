@extends('stranka.layout.layout')


@section("content")
    <div class="row">

        <h2>Zgodovina nakupov</h2>

        <div class="col-12">
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

            @forelse($racuni as $racun)
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
    </div>
@endsection