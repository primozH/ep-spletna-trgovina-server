@extends('admin.layout.layout')

@section("content")
    @if($prodajalec)
        <h1>{{ $prodajalec->ime }}</h1>
        <div class="row">
            <div class="col-6">
                <form action="/admin/prodajalci/{{ $prodajalec->id_uporabnik }}" method="post">
                    {{ csrf_field() }}
                    Ime:<br>
                    <input type="text" name="ime" value="{{ $prodajalec->ime }}" required><br>
                    Priimek:<br>
                    <input type="text" name="priimek" value="{{ $prodajalec->priimek }}" required><br>
                    E-mail:<br>
                    <input type="email" name="email" value="{{ $prodajalec->email }}" required><br>
                    <div class="form-group">
                        <label for="aktiviran">Aktiviran</label>
                        <select name="aktiviran">
                            <option @if ($prodajalec->aktiviran) selected @endif value="1">Aktiviran</option>
                            <option @if (!$prodajalec->aktiviran) selected @endif value="0">Neaktiven</option>
                        </select>
                    </div>
                    <br>
                    Novo geslo:<br>
                    <input type="password" name="geslo" value=""><br>
                    Ponovno vpiši geslo:<br>
                    <input type="password" name="geslo_ponovi"><br><br>

                    <div class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success" type="submit" >Posodobi</button>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <h3>Pretekla naročila</h3>
            @foreach($prodajalec->ordersForSalesman()->get() as $orders)
                    <div class="row product-item">
                        <div class="col-4">
                            {{ $orders->id_racun }}
                        </div>
                        <div class="col-4">
                            {{ $orders->datum }}
                        </div>
                        <div class="col-4">
                            {{ $orders->znesek }}
                        </div>
                    </div>
                    @endforeach
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

    @else
        <h1>Dodaj prodajalca</h1>
        <form action="/admin/prodajalci" method="post">
            {{ csrf_field() }}
            Ime:<br>
            <input type="text" name="ime" required><br>
            Priimek:<br>
            <input type="text" name="priimek" required><br>
            E-mail:<br>
            <input type="email" name="email" required><br>
            Geslo:<br>
            <input type="password" name="geslo" required><br>
            Ponovno vpiši geslo:<br>
            <input type="password" name="geslo_ponovi" required><br><br>

            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success" type="submit" >Ustvari</button>
            </div>
        </form>

    @endif


@endsection