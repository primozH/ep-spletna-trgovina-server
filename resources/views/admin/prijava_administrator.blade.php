@extends('admin.layout.layout')


@section("content")
    <h2>Administrator</h2>
    <form action="/admin/prijava" method="post">
        Uporabniško ime:<br>
        <input type="text" name="email"><br>
        Geslo:<br>
        <input type="password" name="geslo"><br><br>
        <div class="form-inline my-2 my-lg-0">
            <button type="submit" class="btn btn-success">Prijava</button>
        </div>
    </form>
@endsection