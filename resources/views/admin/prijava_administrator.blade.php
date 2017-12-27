@extends('layout.layout')


@section("content")
    <h2>Administrator</h2>
    <form action="/" method="post">
        Uporabniško ime:<br>
        <input type="text" name="up_ime"><br>
        Geslo:<br>
        <input type="password" name="geslo"><br><br>
        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/izdelki-administrator">Prijava</a>
        </div>
    </form>
    <a href="/"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>
@endsection