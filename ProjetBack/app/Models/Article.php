<?php

namespace App\Models;

use App\Models\ArticleVente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded=[
        "id"
    ];
    public function articleVentes()
    {
        return $this->belongsToMany(ArticleVente::class,'art_vente_confecs');
    }
}
