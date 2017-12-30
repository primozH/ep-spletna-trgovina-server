@extends('stranka.layout.layout')

@section("content")

    <form action="/" method="post">
        Ime:<br>
        <input type="text" name="ime_prodajalca"><br>
        Priimek:<br>
        <input type="text" name="priimek_prodajalca"><br>
        E-mail:<br>
        <input type="text" name="el_naslov_prodajalca"><br>
        Geslo:<br>
        <input type="password" name="geslo_prodajalca"><br><br>

        <div class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/upravljanje-administrator">Ustvari prodajalca</a>
        </div>
    </form>


    <a href="/upravljanje-administrator"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>


@endsection