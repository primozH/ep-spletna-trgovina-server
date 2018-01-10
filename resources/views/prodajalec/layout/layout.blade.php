<!DOCTYPE>

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset("css/style.css") }}" />
        <title>Prodaja: Spletna trgovina EP</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
            <a class="navbar-brand" href="/prodaja">Prodaja: Spletna trgovina EP</a>
            @if(session()->has("salesId"))
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-link" href="/prodaja">Računi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prodaja/izdelki">Izdelki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prodaja/stranke">Stranke</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/prodaja/profil">Profil</a>
                    </li>
                </ul>
                <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/prodaja/odjava">Odjava</a>
            </div>
            @endif
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