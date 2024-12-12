@extends('templates.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $ong->nome_completo }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $ong->email }}</p>
                    <p><strong>Telefone:</strong> {{ $ong->telefone }}</p>
                    <p><strong>Endereço:</strong> {{ $ong->rua }}</p>
                    <p><strong>Cidade:</strong> {{ $ong->cidade }}</p>
                    <p><strong>Estado:</strong> {{ $ong->estado }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection