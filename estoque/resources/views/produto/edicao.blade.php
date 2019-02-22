@extends('layout.principal')

@section('conteudo')

    <h1>Alteração do Produto: <strong>{{ $p->nome }}</strong></h1>

    <form action="{{ $action }}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <!--<input type="hidden" name="id" value="{{ $p->id }}"/>-->

        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ $p->nome }}"/>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" value="{{ $p->descricao }}"/>
        </div>

        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{ $p->valor }}"/>
        </div>

        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control" value="{{ $p->quantidade }}"/>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-block">Alterar</button>
        </div>
    </form>

    @if (old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong>O produto {{ old('nome') }} foi alterado.
        </div>
    @endif

@stop