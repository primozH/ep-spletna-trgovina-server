@extends('prodajalec.layout.layout')


@section("content")
    <h2>Prodajalec</h2>
    <form action="/prodaja/prijava" method="post">
        {{ csrf_field() }}
        Geslo:<br>
        <input type="password" name="geslo" autofocus required><br><br>
        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Prijava</button>
        </div>
    </form>
@endsection