<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div>
            Pozdravljen/a {{ $ime }}
            <br/>
            Hvala...
            <br/>

            <a href="{{ url("registracija/potrdi", $token) }}">Potrdi račun!</a>

            <br/>
        </div>
    </body>
</html>