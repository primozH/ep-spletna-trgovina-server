@extends('layout.layout')


@section("content1")
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Domov <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pozdravljen, Miha!
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/posodobi">Posodobi podatke</a>
                    <a class="dropdown-item" href="/zgodovina">Zgodovina nakupov</a>
                    <a class="dropdown-item" href="/kosarica">Košarica</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2 my-sm-0" type="submit" style="position: absolute; right: 50;" href="/">Odjava</a>
        </form>
    </div>
@endsection
@section("content")
    <h2>Artikli</h2>
@endsection