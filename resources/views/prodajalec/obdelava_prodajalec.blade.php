@extends('layout.layout')


@section("content")
    <h1> Obdelava naročil </h1>
    <ul>
        <li><a href="/neobdelana-prodajalec" style="color: green;">Pregled neobdelanih naročil</a></li>
        <li><a href="/potrjena-prodajalec" style="color: green;">Pregled potrjenih naročil</a></li>
        <li><a href="/dodaj-prodajalec" style="color: green;">Dodaj artikel</a></li>
        <li><a href="/artikli-prodajalec" style="color: green;">Pregled artiklov</a></li>
        <li><a href="/ustvari-prodajalec" style="color: green;">Ustvari stranko</a></li>
        <li><a href="/stranke-prodajalec" style="color: green;">Pregled strank</a></li>

    </ul>
    <a href="/izdelki-administrator"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>

@endsection