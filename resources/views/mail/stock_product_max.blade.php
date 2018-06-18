@extends('layouts.mail')
@section('content')
    <h2>Excedente de Produto</h2>
    <h3>O produto <i>{{ $product }}</i> ultrapassou limite máximo de {{ $max }} estalecido. A quantidade atual em estoque é de {{ $qtd }}.</h3>
@stop