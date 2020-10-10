@extends('welcome')

@section('content')
<h1>Item</h1>

<div class="card" style="width: 18rem;">

    <div class="card-body">
        <h5 class="card-title">{{ $resultado['nome'] }}</h5>

        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope="row">Preço da unidade R$</th>
                    <td>{{ $resultado['preco'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Quantidade</th>
                    <td>{{ $resultado['quantidade'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Imposto Unitário %</th>
                    <td>{{ $resultado['percentual_imposto'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Tipo</th>
                    <td>{{ $resultado['descricao'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Valor pago R$</th>
                    <td>{{ $resultado['preco_vendido'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Criado em</th>
                    <td>{{ \Carbon\Carbon::parse($resultado['created_at'])->format('d/m/Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <a class="btn btn-primary" href="{{ route('comprar_produto') }}" role="button">Voltar</a>
    </div>
</div>

@endsection