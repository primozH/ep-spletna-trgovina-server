CERTIFIKATI
PCMA
    geslo: elektronskoposlovanje
Strežnik:
    geslo: webmaster
Administrator:
    email: admin@etrgovina.si
    geslo: administrator
Primož Hrovat (prodajalec):
    email: primoz.hrovat@gmail.com
    geslo: primoz
Miha Mazovec (prodajalec):
    Email: miha.mazovec@gmail.com
    geslo: miham
Matjaž Kolar (prodajalec):
    Email: matjaz.kolar@gmail.com
    geslo: matjaz


Uporabniki v bazi:
    Marko Zajc
    admin@etrgovina.si
    admin
Prodajalec 1:
    Miha Mazovec
    miha.mazovec@gmail.com
    miham
Prodajalec 2:
    Primož Hrovat
    primoz.hrovat.96@gmail.com
    primoz
Prodajalec 3 (preklican certifikat, ni ustvarjen):
    Matjaž Kolar
    matjaz.kolar@gmail.com
    matjaz


UPORABNIKI:
Janez The Man
janez@theman.si
1234

Marko Skače
marko.skace@trata.si
1234

Matija Majer
matija.majer@dobrojutro.si
1234

Janez Novak
janez@novak.si
1234

Krištof Mirni
kristof@majka.si
1234

Matija Mako
matija@matija.si
12345


PB račun za trgovino
    web_shop_api
    web_shop


DODATNI KORAKI ZA NAMESTITEV APLIKACIJE
1. Ustvarjanje baze in uporabnika (datoteka)
2. server_ssl.sh
3. v mapi /var/www/html/spletna-trgovina:
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh --seed
4. Namestitev certifikatov CA agencije, prodajalcev, admina v brskalnik


NAMESTITEV ANDROID APLIKACIJE



