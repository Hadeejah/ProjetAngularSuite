<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class art_vente_confec extends Model
{
    use HasFactory;

    protected $fillable=[
        "qte",
        "article_id",
        "article_vente_id"
    ];
}
