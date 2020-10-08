<?php

namespace App\Repositories\Api\Produto;

use App\Models\Models\Produto;
use App\Repositories\BaseRepository;

class ProdutoRepository extends BaseRepository
{
    public function __construct(Produto $produto)
    {
        parent::__construct($produto);
    }

    public function all()
    {
        return parent::all();
    }

    public function show(int $produtoId)
    {
        $produtoExist = Produto::find($produtoId);

        return ($produtoExist) ? parent::show($produtoId) : false;
    }

    public function delete(int $produtoId)
    {
        $produtoExist = Produto::find($produtoId);

        return ($produtoExist) ? parent::delete($produtoId) : false;
    }

    public function create(array $dados)
    {
        return parent::create($dados);
    }

    public function update(array $dados, int $produtoId)
    {
        return parent::update($dados, $produtoId);
    }
}
