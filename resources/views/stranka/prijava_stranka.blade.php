@extends('layout.layout')


@section("content")
<div class="row">
    <form action="/prijava" method="post" class="form-horizontal">
        <div class="form-group{{ $error-> }}">
            <label for="uporabnisko_ime" class="col-12 col-md-6 offset-md-3 control-label">Uporabniško ime</label>
            <div class="col-12 col-md-6 offset-md-3">

                <input id="uporabnisko_ime" type="text" name="uporabnisko_ime" value="{{ old('uporabnisko_ime') }}" class="form-control" required autofocus>

            </div>
        </div>
        Geslo:<br>
        <input type="password" name="geslo"><br><br>
        <div class="form-inline my-2 my-lg-0">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Prijava" />
        </div>
    </form>
</div>
    <a href="/"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>
@endsection