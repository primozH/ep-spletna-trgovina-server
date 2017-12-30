@extends('stranka.layout.layout')


@section("content")
    <h1> Upravljanje </h1>
    <ul>
        <li><a href="/ustvari-administrator" style="color: green;">Ustvari prodajalca</a></li>
        <li><a href="/prodajalci-administrator" style="color: green;">Aktiviraj/deaktiviraj prodajalca</a></li>
    </ul>
    <a href="/izdelki-administrator"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>

@endsection