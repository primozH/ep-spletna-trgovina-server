@extends('stranka.layout.layout')

@section("content")
    <div class="row">
        <div class="col-md-6 offset-md-3">

            @if ($uspesno)
                <div class="alert alert-success" role="alert">
                    {{ $sporocilo }} <a href="/">Na prvo stran</a>
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    Napaka pri registraciji! Poskusite poonovno: <a href="/registracija">Registracija</a>
                </div>
            @endif
        </div>
    </div>


@endsection