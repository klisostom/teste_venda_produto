<?php

namespace App\Repositories\Api\Produto;

use App\Models\Produto\ProdutoTipoProduto;

class ProdutoTipoProdutoRepository
{
    protected $produtoTipoProduto;

    public function __construct(ProdutoTipoProduto $produtoTipoProduto)
    {
        $this->produtoTipoProduto = $produtoTipoProduto;
    }

    public function create(array $dados)
    {
        return true;
    }
}
