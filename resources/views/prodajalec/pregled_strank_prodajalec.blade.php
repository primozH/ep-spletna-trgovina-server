@extends('prodajalec.layout.layout')


@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>Stranke</h3>

                <div class="row">
                    <div class="col-3">
                        <span>Id</span>
                    </div>
                    <div class="col-3">
                        <span>Priimek</span>
                    </div>
                    <div class="col-3">
                        <span>Ime</span>
                    </div>
                    <div class="col-3">
                        <span>Email</span>
                    </div>
                </div>
                @foreach($stranke as $stranka)
                    <div class="row">
                        <div class="col-3">
                            <a href="/prodaja/stranke/{{ $stranka->id_uporabnik }}">
                                <span>{{ $stranka->id_uporabnik }}</span>
                            </a>
                        </div>
                        <div class="col-3">
                            <span>{{ $stranka->priimek }}</span>
                        </div>
                        <div class="col-3">
                            <span>{{ $stranka->ime }}</span>
                        </div>
                        <div class="col-3">
                            <span>{{ $stranka->email }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-3">

                <a href="/prodaja/stranke/dodaj" class="btn btn-success">Dodaj stranko</a>
            </div>
        </div>
    </div>

@endsection