@extends('layouts.sideBarUser')
@section('title', 'Home')
@section('content')
<div class="cards">
    <div class="row">
        @foreach($status as $status)
            <div class="col">
                {{$status->descricao}}
                <hr>
            </div>
        @endforeach
        @foreach($chamado as $chamado)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$chamado->titulo}}</h5>
                    <p class="card-text">{{$chamado->descricao}}</p>
                    <a href="/chamados/{{$chamado->id}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 
