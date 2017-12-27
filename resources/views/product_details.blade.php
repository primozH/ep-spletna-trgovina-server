@extends('layout.layout')

@section("content")
    <h1>{{ $product_name }}</h1>
    <p>{{ $product_description }}</p>
    <p>{{ $product_price }}</p>
    @foreach ($images as $image)
        <img src={{ $image->pot }}>
    @endforeach
@endsection