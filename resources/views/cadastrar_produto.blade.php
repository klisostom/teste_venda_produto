@extends('welcome')

@section('content')
<div class="container-lg">
    <div class="row">
        <div class="col-12">
            <form action="/api/produtos" method="POST">
                @csrf
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="nome">Item</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nome"
                            id="nome"
                        >
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço da unidade R$</label>
                        <input
                            type="text"
                            class="form-control"
                            aria-label="Amount (to the nearest dollar)"
                            id="preco"
                            name="preco"
                            min="0"
                        >
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input
                            type="number"
                            class="form-control"
                            name="quantidade"
                            id="quantidade"
                            min="1"
                            pattern="[0-9]"
                        >
                    </div>

                    <div class="form-group">
                        <label for="percentual_imposto"
                            >Imposto Unitário %</label
                        >
                        <p>
                            <small class="text-muted"
                                >Exemplo: 35, 35.8 ou 35.80</small
                            >
                        </p>
                        <input
                            type="text"
                            class="form-control"
                            name="percentual_imposto"
                            id="percentual_imposto"
                            min="0"
                            aria-label="Amount (to the nearest dollar)"
                            onfocusout="calcularValores()"
                        >
                    </div>

                    <div class="form-group">
                        <label for="tipo_produto">Tipo</label>
                        <input
                            type="text"
                            class="form-control"
                            name="tipo_produto"
                            id="tipo_produto"
                        >
                    </div>

                    <div class="form-row">
                        <div class="col-auto">
                            <label for="preco_sem_impostos">
                                Total <strong>sem</strong> impostos R$
                            </label>
                            <input
                                type="text"
                                readonly
                                class="form-control-plaintext"
                                name="preco_sem_impostos"
                                id="preco_sem_impostos"
                            >
                        </div>
                        <div class="col-auto">
                            <label for="imposto_total"
                                >Total de impostos R$</label
                            >
                            <input
                                type="text"
                                readonly
                                class="form-control-plaintext"
                                name="imposto_total"
                                id="imposto_total"
                            >
                        </div>
                        <div class="col-auto">
                            <label for="total_compra"
                                ><strong>Valor final</strong> R$</label
                            >
                            <input
                                type="text"
                                readonly
                                class="form-control-plaintext"
                                name="total_compra"
                                id="total_compra"
                            >
                        </div>
                    </div>

                    <br >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            COMPRAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.onload = function () {
        document.getElementById("preco_sem_impostos").value = "";
        document.getElementById("imposto_total").value = "";
        document.getElementById("total_compra").value = "";
        document.getElementById("quantidade").value = "";
        document.getElementById("percentual_imposto").value = "";
        document.getElementById("preco").value = "";
        document.getElementById("nome").value = "";
        document.getElementById("tipo_produto").value = "";
    };

    function calcularValores() {
        const quantidade_produto = document.getElementById("quantidade").value;
        const percentual_imposto = parseInt(
            document.getElementById("percentual_imposto").value
        );
        const preco = document.getElementById("preco").value;

        if (
            quantidade_produto &&
            percentual_imposto &&
            preco &&
            quantidade_produto != null &&
            percentual_imposto != null &&
            preco != null
        ) {
            const valor_total_sem_impostos = (
                quantidade_produto * preco
            ).toFixed(2);
            const percentual_parcial = percentual_imposto / 100;

            document.getElementById(
                "preco_sem_impostos"
            ).value = valor_total_sem_impostos;
            document.getElementById("imposto_total").value = (
                percentual_parcial * valor_total_sem_impostos
            ).toFixed(2);

            const total = valor_total_sem_impostos * (1 + percentual_parcial);
            document.getElementById("total_compra").value = total.toFixed(2);
        }
    }
</script>
@endsection
