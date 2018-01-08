@extends("stranka.layout.layout")

@section("content")

    <div class="row">
        <div class="col-4">

            {{ $racun->id_racun }}
        </div>
        <div class="col-2">
            {{ $racun->znesek }}
        </div>
        <div class="col-6">
            @foreach($racun->invoiceItems as $item)
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $item->product->naziv }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea rows="5" columns="10">{{ $item->product->opis }}
                        </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        {{ $item->cena }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection