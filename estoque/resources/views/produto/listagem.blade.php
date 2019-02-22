@extends('layout.principal')

@section('conteudo')

    @if(empty($produtos))
        <div class="alert alert-danger">
            Nenhum produto cadastrado!
        </div>
    @else
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'danger' : ''}}">
                    <td>{{ $p->nome }}</td>
                    <td>{{ $p->valor }}</td>
                    <td>{{ $p->descricao }}</td>
                    <td>{{ $p->quantidade }}</td>
                    <!--<td><a href="/produtos/mostra?id=< ?= $p->id ?>"><span class="glyphicon glyphicon-search"></span></a>-->
                    <td><a href="/produtos/mostra/{{ $p->id }}"><span class="glyphicon glyphicon-search"></span></a></td>
                    <td><a href="{{ action('ProdutoController@edita', $p->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="{{ action('ProdutoController@remove', $p->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
            @endforeach
        </table>

        <h4>
            <span class="label label-danger pull-right">Um ou nenhum item em estoque.</span>
        </h4>
    @endif

@stop