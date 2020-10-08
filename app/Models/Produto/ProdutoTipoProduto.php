<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProdutoTipoProduto extends Model
{
    use HasFactory;

    /** The attributes that are mass assignable. @var array */
    protected $fillable = [
        'quantidade',
        'percentual_imposto',
        'preco_vendido',
        'produto_id',
        'tipo_produto_id',
    ];

    /* =======================
    === Relacionamentos ===
    ======================= */

    /** Tem um produto */
    public function produtos(): HasOne
    {
        return $this->hasOne('App\Models\Produto\Produto', 'produto_id');
    }

    /** Tem um tipo de produto */
    public function tipoProduto(): HasOne
    {
        return $this->hasOne('App\Models\Produto\TipoProduto', 'tipo_produto_id');
    }
}
