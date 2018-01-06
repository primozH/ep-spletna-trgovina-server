@extends('prodajalec.layout.layout')

@section("content")

    <div class="container-fluid">
        <div class="col-6">
            <form action="/prodaja/profil" method="post">
                Ime:<br>
                <input type="text" name="ime"><br>
                Priimek:<br>
                <input type="text" name="priimek"><br>
                E-mail:<br>
                <input type="text" name="email"><br>
                Geslo:<br>
                <input type="password" name="geslo"><br>
                Ponovi geslo:<br>
                <input type="password" name="geslo_rep"><br>

                <div class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Posodobi</button>
                </div>
            </form>
        </div>
    </div>


@endsection