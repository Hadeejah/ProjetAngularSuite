<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleVente extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded=[
        "id"
    ];
    public function articles()
    {
        return $this->belongsToMany(Article::class,'art_vente_confecs');
    }
}
