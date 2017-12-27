@extends('layout.layout')

@section("content")

    <form action="/" method="post">
        Ime:<br>
        <input type="text" name="ime_prodajalec"><br>
        Priimek:<br>
        <input type="text" name="geslo_prodajalec"><br>
        E-mail:<br>
        <input type="text" name="el_naslov_prodajalec"><br>
        Staro geslo:<br>
        <input type="password" name="staro_geslo_prodajalec"><br>
        Geslo:<br>
        <input type="password" name="novo_geslo_prodajalec"><br>
        Ponovno vpiši geslo:<br>
        <input type="password" name="novo_geslo_prodajalec"><br><br>

        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/izdelki-prodajalec">Posodobi</a>
        </div>
    </form>


    <a href="/izdelki-prodajalec"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>


@endsection