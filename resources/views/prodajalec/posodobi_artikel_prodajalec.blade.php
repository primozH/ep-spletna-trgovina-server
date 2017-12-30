@extends('stranka.layout.layout')

@section("content")

    <form action="/" method="post">
        Ime:<br>
        <input type="text" name="ime_artikla"><br>
        Opis:<br>
        <textarea name="opis_artikla" cols="70", rows="10"></textarea><br>
        Slike:<br>


        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/obdelava-prodajalec">Shrani</a>
        </div>
    </form>


    <a href="/artikli-prodajalec"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>


@endsection