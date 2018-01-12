@extends('admin.layout.layout')

@section("content")
    <div class="row">
        <div class="col-6">
            <form action="/admin/profil" method="post">
                {{ csrf_field() }}
                Ime:<br>
                <input type="text" name="ime" value="{{ $admin->ime }}" required autofocus><br>
                Priimek:<br>
                <input type="text" name="priimek" value="{{ $admin->priimek }}" required><br>
                Geslo:<br>
                <input type="password" name="geslo"><br>
                Ponovi geslo:<br>
                <input type="password" name="geslo_rep"><br>

                <div class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Posodobi</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <h3>Dnevnik aktivnosti</h3>
            <ul>
                @forelse($logs as $log)
                    <li><strong>{{ $log->datum_cas }}</strong> <span>{{ $log->tip }}</span> <span>{{ $log->opis }}</span></li>
                @empty
                    <h4>Ni aktivnosti!</h4>
                @endforelse
            </ul>
        </div>
    </div>

@endsection