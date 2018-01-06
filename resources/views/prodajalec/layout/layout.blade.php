<!DOCTYPE>

<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset("css/style.css") }}" />
        <title>Spletna trgovina</title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }



        </style>
        <script>
            function allowDrop(ev) {
                ev.preventDefault();
            }

            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id);
            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("text");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
            <a class="navbar-brand" href="/">Spletna trgovina EP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/prodaja/izdelki">Izdelki</a>
                    </li>
                    <li class="nav-item">
                        <a href="/prodaja/stranke">Stranke</a>
                    </li>
                    <li>
                        <a href="/prodaja/profil">Profil</a>
                    </li>
                </ul>
                @if(!session()->has("userid"))
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/prijava">Prijava</a>
                        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/registracija">Registracija</a>

                    </form>
                @else
                    <a class="btn btn-outline-success" href="/odjava">Odjava</a>
                    <a class="btn btn-outline-danger" id="shoppingCartBtn" href="/kosarica">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Košarica</span>
                        <div>
                            <span id="price">0</span><span> €</span>
                        </div>
                    </a>
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