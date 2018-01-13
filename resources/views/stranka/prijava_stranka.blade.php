@extends('stranka.layout.layout')


@section("content")
    @if (!empty($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
<div class="row">

    <div class="col-6">
    <form action="/prijava" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email" class="col-12 col-md-6 offset-md-3 control-label">Email</label>
            <div class="col-12 col-md-6 offset-md-3">

                <input id="uporabnisko_ime" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>

            </div>
        </div>

        <div class="form-group">
            <label for="geslo" class="col-12 col-md-6 offset-md-3 control-label">Geslo</label>
            <div class="col-12 col-md-6 offset-md-3">

                <input id="geslo" type="password" name="geslo" class="form-control" required>

            </div>
        </div>

        <div class="form-group">

            <div class="col-12 col-md-6 offset-md-3">

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Prijava</button>
            </div>
        </div>
    </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection