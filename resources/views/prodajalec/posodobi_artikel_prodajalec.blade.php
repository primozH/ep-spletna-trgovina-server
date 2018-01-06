@extends('prodajalec.layout.layout')

@section("content")
    @if($izdelek)
        <h1>{{ $izdelek->naziv }}</h1>

        <form action="/prodaja/izdelki/{{ $izdelek->id_produkt }}" method="post">
            Naziv:<br>
            <input type="text" name="naziv" value="{{ $izdelek->naziv }}"><br>
            Opis:<br>
            <textarea name="opis" cols="70", rows="10">{{ $izdelek->opis }}</textarea><br>

            <div class="form-group">
                <label for="cena">Cena</label>
                <input type="text" value="{{ $izdelek->currentPrice()->cena }}" name="cena"/>
            </div>
            <div class="form-group">
                <label for="veljavno_do">Veljavno do</label>
                <input type="date" value="{{ $izdelek->currentPrice()->veljavno_do }}" name="veljavno_do"/>
            </div>

            <div class="form-group">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Shrani</button>
            </div>
        </form>

        <form action="/prodaja/izdelki/{{ $izdelek->id_produkt }}/slike" method="post" enctype="multipart/form-data">

            Slike:
            <input type="file" name="slika" accept="image/*"/>
            <button type="submit">Naloži</button>
        </form>

    @else
        <h1>Dodaj izdelek</h1>

        <form action="/prodaja/izdelki/dodaj" method="post">
            Naziv:<br>
            <input type="text" name="naziv" value="" required><br>
            Opis:<br>
            <textarea name="opis" cols="70", rows="10" required></textarea><br>

            <div class="form-group">
                <label for="cena">Cena</label>
                <input type="text" value="" name="cena" required/>
            </div>
            <div class="form-group">
                <label for="veljavno_do">Veljavno do</label>
                <input type="date" value="" name="veljavno_do" required/>
            </div>

            <div class="form-group">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Shrani</button>
            </div>
        </form>

    @endif


@endsection