@extends('prodajalec.layout.layout')

@section("content")
    @if($stranka)
        <h1>{{ $stranka->ime }}</h1>
        <form action="/prodaja/stranke/{{ $stranka->id_uporabnik }}" method="post">
            {{ csrf_field() }}
            Ime:<br>
            <input type="text" name="ime" value="{{ $stranka->ime }}" required><br>
            Priimek:<br>
            <input type="text" name="priimek" value="{{ $stranka->priimek }}" required><br>
            Uporabniško ime:
            <input type="text" name="uporabnisko_ime" value="{{ $stranka->uporabnisko_ime}}" required>
            E-mail:<br>
            <input type="email" name="email" value="{{ $stranka->email }}" required><br>
            Naslov:<br>
            <input type="text" name="naslov" value="{{ $stranka->naslov }}" required><br>
            Telefonska številka:<br>
            <input type="text" name="tel_stevilka" value="{{ $stranka->tel_stevilka }}"><br>
            Novo geslo:<br>
            <input type="password" name="geslo" value=""><br>
            Ponovno vpiši geslo:<br>
            <input type="password" name="geslo_ponovi"><br><br>

            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success" type="submit" >Posodobi</button>
            </div>
        </form>

    @else
        <h1>Dodaj stranko</h1>
        <form action="/prodaja/stranke/dodaj" method="post">
            Ime:<br>
            <input type="text" name="ime" required><br>
            Priimek:<br>
            <input type="text" name="priimek" required><br>
            Uporabniško ime:
            <input type="text" name="uporabnisko_ime" required>
            E-mail:<br>
            <input type="email" name="email" required><br>
            Naslov:<br>
            <input type="text" name="naslov" required><br>
            Telefonska številka:<br>
            <input type="text" name="tel_stevilka" required><br>
            Geslo:<br>
            <input type="password" name="geslo" required><br>
            Ponovno vpiši geslo:<br>
            <input type="password" name="geslo_ponovi" required><br><br>

            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success" type="submit" >Ustvari</button>
            </div>
        </form>

    @endif


@endsection