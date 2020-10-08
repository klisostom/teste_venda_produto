<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    use HasFactory;

    /** The attributes that are mass assignable. @var array */
    protected $fillable = ['nome', 'preco'];

    /* =======================
    === Relacionamentos ===
    ======================= */

    /** Os tipos de produto que pertence a um produto. */
    public function tiposProdutos(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Produto\TipoProduto',
            'produto_tipo_produtos',
            'produto_id',
            'tipo_produto_id'
        );
    }
}
