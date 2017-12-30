@extends('stranka.layout.layout')


@section("content")
<div class="row">
    <form action="/prijava" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="uporabnisko_ime" class="col-12 col-md-6 offset-md-3 control-label">Uporabniško ime</label>
            <div class="col-12 col-md-6 offset-md-3">

                <input id="uporabnisko_ime" type="text" name="uporabnisko_ime" value="{{ old('uporabnisko_ime') }}" class="form-control" required autofocus>

            </div>
        </div>

        <div class="form-group">
            <label for="geslo" class="col-12 col-md-6 offset-md-3 control-label">Geslo</label>
            <div class="col-12 col-md-6 offset-md-3">

                <input id="geslo" type="password" name="geslo" class="form-control" required>

            </div>
        </div>

        <div class="form-group">

            <div class="col-12 col-md-6 offset-md-3">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/izdelki-stranka">Prijava</button>
            </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
    <a href="/"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>
@endsection