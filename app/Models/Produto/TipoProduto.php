<?php

namespace App\Models\Produto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TipoProduto extends Model
{
    use HasFactory;

    /** The attributes that are mass assignable. @var array */
    protected $fillable = ['descricao'];

    /* =======================
    === Relacionamentos ===
    ======================= */

    public function produto(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Produto\Produto');
    }
}
