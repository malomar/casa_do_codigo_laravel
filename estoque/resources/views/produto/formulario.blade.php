@extends('layout.principal')

@section('conteudo')

    <h1>Novo Produto</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--<form action="/produtos/adiciona" method="post">-->
    <form action="{{ $action }}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ old('nome') }}"/>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" value="{{ old('descricao') }}"/>
        </div>

        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{ old('valor') }}"/>
        </div>

        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control" value="{{ old('quantidade') }}"/>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
        </div>
    </form>

    @if (old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>O produto {{ old('nome') }} foi adicionado.
        </div>
    @endif

@stop