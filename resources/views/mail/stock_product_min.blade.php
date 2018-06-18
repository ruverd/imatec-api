@extends('layouts.mail')
@section('content')
    <h2>Solicitação de Compra </h2>
    <h3>O produto <i>{{ $product }}</i> ultrapassou limite mínimo de {{ $min }} estalecido. A quantidade atual em estoque é de {{ $qtd }}. Quantidade estabelecida para compra é de {{ $purchase }}</h3>
@stop