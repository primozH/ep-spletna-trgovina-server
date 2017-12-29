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
        <div class="container-fluid">
            <img src="http://www.imgnaly.com/wp-content/uploads/2015/05/Shopping-Begins.png" alt="Let the shopping begin" height="300">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
            <a class="navbar-brand" href="/">Spletna trgovina EP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Možnosti
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/prijava-administrator">Prijava kot administrator</a>
                            <a class="dropdown-item" href="/prijava-prodajalec">Prijava kot prodajalec</a>
                            <a class="dropdown-item" href="/zgodovina-nakupov">Zgodovina nakupov</a>
                            <a class="dropdown-item" href="/kosarica">Košarica</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/odjava">Odjava</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/prijava">Prijava</a>
                    <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/registracija">Registracija</a>

                </form>
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