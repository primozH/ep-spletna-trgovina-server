@extends('layout.layout')


@section("content1")
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/izdelki">Domov <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Možnosti
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/prijava-administrator">Prijava kot administrator</a>
                    <a class="dropdown-item" href="/prijava-prodajalec">Prijava kot prodajalec</a>
                    <!--<a class="dropdown-item" href="/zgodovina-nakupov">Zgodovina nakupov</a>
                    <a class="dropdown-item" href="/kosarica">Košarica</a>-->
                    <!--<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/odjava">Odjava</a>-->
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" style="position: absolute; right: 50;" href="/prijava">Prijava</a>
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" style="position: absolute; right: 150;" href="/registracija">Registracija</a>

        </form>
    </div>
@endsection
@section("content")
    <h2>Artikli</h2>
@endsection