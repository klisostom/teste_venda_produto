<?php

namespace App\Repositories\Api\Produto;

use App\Models\Produto\Produto;
use App\Models\Produto\TipoProduto;
use Illuminate\Support\Facades\Log;
use App\Repositories\BaseRepository;
use App\Models\Produto\ProdutoTipoProduto;

class ProdutoRepository extends BaseRepository
{
    protected $tipoProduto;
    protected $produtoTipoProduto;

    public function __construct(
        Produto $produto,
        TipoProduto $tipoProduto,
        ProdutoTipoProduto $produtoTipoProduto
    ) {
        $this->tipoProduto = $tipoProduto;
        $this->produtoTipoProduto = $produtoTipoProduto;

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

    private function createProduto(array $dados)
    {
        return parent::create([
            'nome' => $dados['nome'],
            'preco' => $dados['preco']
        ]);
    }

    private function createTipoProduto(array $dados)
    {
        parent::setModel($this->tipoProduto);
        return parent::create(['descricao' => $dados['tipo_produto']]);
    }

    private function createProdutoTipoProduto(
        array $dados,
        int $produtoCadastradoId,
        int $tipoProdutoCadastradoId
    ) {
        parent::setModel($this->produtoTipoProduto);
        return parent::create([
            'quantidade' => $dados['quantidade'],
            'percentual_imposto' => $dados['percentual_imposto'],
            'preco_vendido' => $dados['total_compra'],
            'produto_id' => $produtoCadastradoId,
            'tipo_produto_id' => $tipoProdutoCadastradoId,
        ]);
    }

    public function create(array $dados)
    {
        $produtoCadastrado = $this->createProduto($dados);
        $tipoProdutoCadastrado = $this->createTipoProduto($dados);
        $produtoTipoProdutoCadastrado = $this->createProdutoTipoProduto(
            $dados,
            $produtoCadastrado->id,
            $tipoProdutoCadastrado->id
        );

        return array_merge(
            json_decode($produtoCadastrado, true),
            json_decode($tipoProdutoCadastrado, true),
            json_decode($produtoTipoProdutoCadastrado, true),
        );
    }

    public function update(array $dados, int $produtoId)
    {
        return parent::update($dados, $produtoId);
    }
}
