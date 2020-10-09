<?php

namespace App\Repositories\Api\Produto;

use App\Models\Produto\TipoProduto;

class TipoProdutoRepository
{
    protected $tipoProduto;

    public function __construct(TipoProduto $tipoProduto)
    {
        $this->tipoProduto = $tipoProduto;
    }

    public function create(array $dados)
    {
        return true;
    }
}
