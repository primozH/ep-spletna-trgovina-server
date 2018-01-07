@extends('admin.layout.layout')

@section("content")
    <div class="row">
        <div class="col-6">
            <h2>Aktivni prodajalci</h2>
            <div class="row">
                    <div class="col-4">
                        Ime
                    </div>
                    <div class="col-4">
                        Priimek
                    </div>
                    <div class="col-4">
                        Število naročil
                    </div>
            </div>
            @foreach($prodajalci as $prodajalec)
                <div class="row">
                    <div class="col-4">
                        <a href="/admin/prodajalci/{{ $prodajalec->id_uporabnik }}">
                            {{ $prodajalec->ime }}
                        </a>
                    </div>
                    <div class="col-4">
                        {{ $prodajalec->priimek }}
                    </div>
                    <div class="col-4">
                        {{ $prodajalec->ordersForSalesman()->count() }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-6">
            <h2>Neaktivni prodajalci</h2>
            <div class="row">
                <div class="col-4">
                    Ime
                </div>
                <div class="col-4">
                    Priimek
                </div>
            </div>
            @foreach($neaktivni as $prodajalec)
                <div class="row">
                    <div class="col-4">
                        <a href="/admin/prodajalci/{{ $prodajalec->id_uporabnik }}">
                            {{ $prodajalec->ime }}
                        </a>
                    </div>
                    <div class="col-4">
                        {{ $prodajalec->priimek }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <a href="/admin/prodajalci" class="btn btn-success">Dodaj prodajalca</a>
        </div>
    </div>
@endsection