@extends('stranka.layout.layout')

@section("content")

    <form action="/profil" method="post">
        @if (! empty($error))
            <div role="alert" class="alert alert-danger">{{ $error }}</div>
        @endif
        {{ csrf_field() }}
        Ime:<br>
        <input type="text" name="ime" required value="{{ $stranka->ime }}"><br>
        Priimek:<br>
        <input type="text" name="priimek" value="{{ $stranka->priimek }}" required><br>
        E-mail:<br>
        <input type="email" name="email" value="{{ $stranka->email }}" required><br>
        Naslov:<br>
        <input type="text" name="naslov" value="{{ $stranka->naslov }}" required><br>
        Telefonska številka:<br>
        <input type="text" name="tel_stevilka" value="{{ $stranka->tel_stevilka }}" required><br>
        Staro geslo:<br>
        <input type="password" name="geslo_staro"><br>
        Geslo:<br>
        <input type="password" name="geslo"><br>
        Ponovno vpiši geslo:<br>
        <input type="password" name="geslo_rep"><br><br>

        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Posodobi</button>
        </div>
    </form>


    <a href="/izdelki-stranka"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>


@endsection