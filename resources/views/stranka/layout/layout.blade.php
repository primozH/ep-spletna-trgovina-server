<!DOCTYPE>

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset("css/style.css") }}" />
        <title>Spletna trgovina</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
            <a class="navbar-brand" href="/">Spletna trgovina EP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form action="/izdelki" class="form-inline">
                    <input type="search" name="search" placeholder="Išči..." />
                    <button type="submit" class="btn btn-default">Išči</button>
                </form>
                @if(!session()->has("userId"))
                    <div class="navbar-nav">
                        <a class="btn btn-outline-success" href="/prijava">Prijava</a>
                        <a class="btn btn-outline-success" href="/registracija">Registracija</a>
                    </div>

                @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/profil">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/racuni">Zgodovina nakupov</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-danger" id="shoppingCartBtn" href="/kosarica">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Košarica</span>
                        <span id="price">0</span><span> €</span>
                    </a>
                    <a class="btn btn-outline-success" href="/odjava">Odjava</a>
                @endif
            </div>
        </nav>

        <div class="container-fluid">
            @yield("content")
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{ URL::asset("fontawesome/fontawesome-all.js") }}"></script>
    @yield("script")
</html>