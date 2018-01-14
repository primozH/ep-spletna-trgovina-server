<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div>
            Pozdravljen/a {{ $ime }}!
            <br/>
            Ustvarili ste račun pri spletni trgovini EP.
            Za potrditev registracije prosim obiščite spodnjo povezavo.
            <br/>

            <a href="{{ url("registracija/potrdi?code=" . $token . "&user=" . $id) }}">Potrdi registracijo!</a>

            <br/>
        </div>
    </body>
</html>