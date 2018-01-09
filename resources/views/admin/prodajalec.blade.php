@extends('admin.layout.layout')

@section("content")
    @if($prodajalec)
        <h1>{{ $prodajalec->ime }}</h1>
        <div class="row">
            <div class="col-6 offset-3">
                <form action="/admin/prodajalci/{{ $prodajalec->id_uporabnik }}" method="post">
                    {{ csrf_field() }}
                    Ime:<br>
                    <input type="text" name="ime" value="{{ $prodajalec->ime }}" required><br>
                    Priimek:<br>
                    <input type="text" name="priimek" value="{{ $prodajalec->priimek }}" required><br>
                    E-mail:<br>
                    <input type="email" name="email" value="{{ $prodajalec->email }}" required><br>
                    <div class="form-group">
                        <label for="aktiviran">Aktiviran</label>
                        <select name="aktiviran">
                            <option @if ($prodajalec->aktiviran) selected @endif value="1">Aktiviran</option>
                            <option @if (!$prodajalec->aktiviran) selected @endif value="0">Neaktiven</option>
                        </select>
                    </div>
                    <br>
                    Novo geslo:<br>
                    <input type="password" name="geslo" value=""><br>
                    Ponovno vpiši geslo:<br>
                    <input type="password" name="geslo_ponovi"><br><br>

                    <div class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success" type="submit" >Posodobi</button>
                    </div>
                </form>
            </div>
        </div>

    @else
        <h1>Dodaj prodajalca</h1>
        <form action="/admin/prodajalci" method="post">
            Ime:<br>
            <input type="text" name="ime" required><br>
            Priimek:<br>
            <input type="text" name="priimek" required><br>
            E-mail:<br>
            <input type="email" name="email" required><br>
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