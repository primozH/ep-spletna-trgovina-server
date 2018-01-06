@extends('prodajalec.layout.layout')


@section("content")
    <h1>Obdelava naročila </h1>
    <div class="row">

        <div class="col-6">
            <form method="post" action="/prodaja/racuni/{{ $racun->id_racun }}" class="form-horizontal">
                <div class="col-4">
                    <span>Račun št. {{ $racun->id_racun }}</span>
                </div>
                <div>
                    <span>Datum {{ $racun->datum }}</span>
                </div>
                <div class="col-2">
                    <span>Znesek {{ $racun->znesek }} €</span>
                </div>

                <div class="col-4">
                    <span>Status naročila</span>
                    <select name="status">
                        <option value="potrjen" @if($racun->status == "potrjen") selected @endif> Potrjen</option>
                        <option value="preklican" @if($racun->status == "preklican") selected @endif>Preklican</option>
                        <option value="zakljucen" @if($racun->status == "zakljucen") selected @endif>Zaključen</option>
                        <option value="odprt" @if($racun->status == "odprt") selected @endif >Odprt</option>
                    </select>
                </div>
                <div>
                    <span>Prodajalec</span>
                    <input type="number" value="{{ $racun->id_prodajalec }}"/>
                </div>
                <div>
                    <span>Stranka</span>
                    <input type="number" value="{{ $racun->id_stranka }}" disabled/>
                </div>

                <button type="submit" class="btn btn-success">Shrani</button>
            </form>
            @if ($racun->status == "potrjen")
                <form method="post" action="/prodaja/racuni/{{ $racun->id_racun }}/storniraj" class="form-horizontal">
                    <button type="submit" class="btn btn-warning">Storniraj račun</button>
                </form>
            @endif
        </div>
        <div class="col-6">
            <h1>Postavke računa</h1>
            @foreach($racun->invoiceItems as $item)
                <div>
                    <span>{{ $item->product->naziv }}</span>
                </div>
                <div>
                    <span>{{ $item->kolicina }}</span>
                </div>
                <div>
                    <span>{{ $item->cena }}</span>
                </div>
            @endforeach
        </div>
    </div>


@endsection