@extends('prodajalec.layout.layout')


@section("content")
    <h2>Prodajalec</h2>
    <form action="/prodaja/login" method="post">
        Uporabniško ime:<br>
        <input type="text" name="uporabnisko_ime"><br>
        Geslo:<br>
        <input type="password" name="geslo"><br><br>
        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Prijava</button>
        </div>
    </form>
@endsection