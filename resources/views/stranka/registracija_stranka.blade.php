@extends('stranka.layout.layout')

@section("content")
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form class="form-horizontal" action="/registracija" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="ime" class="col-12 col-md-6 offset-md-3 control-label">Ime</label>
                <div class="col-12 col-md-6 offset-md-3">

                    <input id="ime" type="text" name="ime" value="{{ old('ime') }}" class="form-control" required autofocus>

                </div>
            </div>

            <div class="form-group">
                <label for="priimek" class="col-12 col-md-4 offset-md-3 control-label">Priimek</label>
                <div class="col-md-6 offset-md-3">

                    <input id="priimek" type="text" name="priimek" value="{{ old('priimek') }}" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-12 col-md-4 offset-md-3 control-label">E-mail</label>
                <div class="col-md-6 offset-md-3">

                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <label for="naslov" class="col-12 col-md-4 offset-md-3 control-label">Naslov</label>
                <div class="col-md-6 offset-md-3">

                    <input id="naslov" type="text" name="naslov" value="{{ old('naslov') }}" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <label for="tel_stevilka" class="col-12 col-md-4 offset-md-3 control-label">Telefonska številka</label>
                <div class="col-md-6 offset-md-3">

                    <input id="tel_stevilka" type="text" name="tel_stevilka" value="{{ old('tel_stevilka') }}" class="form-control">

                </div>
            </div>
            <div class="form-group">
                <label for="geslo" class="col-12 col-md-4 offset-md-3 control-label">Geslo</label>
                <div class="col-md-6 offset-md-3">

                    <input id="geslo" type="password" name="geslo" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <label for="geslo_rep" class="col-12 col-md-4 offset-md-3 control-label">Ponovite geslo</label>
                <div class="col-md-6 offset-md-3">

                    <input id="geslo_rep" type="password" name="geslo_rep" class="form-control" required>

                </div>
            </div>
            <div class="form-group">
                <div class="col-12 col-md-6 offset-md-4" id="captcha"></div>
            </div>

            <div class="form-group">

                <div class="col-12 col-md-6 offset-md-3">

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="submit-btn">Registracija</button>
                </div>
            </div>

            <div class="alert alert-danger" id="no-captcha" >
                Potrebno je rešiti CAPTCHO!
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
@section("script")
    <script src="{{ URL::asset("js/registracija.js") }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=sl"
            async defer>
    </script>
@endsection