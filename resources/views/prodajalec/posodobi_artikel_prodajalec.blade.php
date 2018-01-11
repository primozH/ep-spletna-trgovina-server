@extends('prodajalec.layout.layout')

@section("content")
    @if($izdelek)
        <h1>{{ $izdelek->naziv }}</h1>

        <div class="row">
            <div class="col-12 col-md-6">

                <form action="/prodaja/izdelki/{{ $izdelek->id_produkt }}" method="post">
                    {{ csrf_field() }}
                    Naziv:<br>
                    <input type="text" name="naziv" value="{{ $izdelek->naziv }}"><br>
                    Opis:<br>
                    <textarea name="opis" cols="70", rows="10">{{ $izdelek->opis }}</textarea><br>

                    <div class="form-group">
                        <select name="aktiviran">
                            <option value="0" @if(!$izdelek->aktiviran) selected @endif >Neaktiven</option>
                            <option value="1" @if( $izdelek->aktiviran) selected @endif >Aktiven</option>
                        </select>
                    </div>

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
                    {{ csrf_field() }}
                    <label for="slika">Dodaj sliko: </label>
                    <input type="file" name="slika" accept="image/*"/>
                    <button type="submit" class="btn btn-success">Naloži</button>
                </form>

            </div>

            <div class="col-12 col-md-6">
            @forelse($izdelek->images()->get() as $image)
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ $image->pot }}" class="img-thumbnail list-product-image"/>
                            <form method="post" action="/prodaja/slike/{{ $image->id_slike }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">Izbriši sliko</button>
                            </form>
                        </div>
                    </div>
                @empty
                <p>Ni slik</p>
                @endforelse
            </div>
        </div>


    @else
        <h1>Dodaj izdelek</h1>

        <form action="/prodaja/izdelki/dodaj" method="post">
            {{ csrf_field() }}
            Naziv:<br>
            <input type="text" name="naziv" value="" required autofocus><br>
            Opis:<br>
            <textarea name="opis" cols="70", rows="10" required></textarea><br>

            <div class="form-group">
                <select name="aktiviran">
                    <option value="0" >Neaktiven</option>
                    <option value="1" selected >Aktiven</option>
                </select>
            </div>

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