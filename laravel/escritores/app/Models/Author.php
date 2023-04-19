<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\Article;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articles(){
        return $this->belongsTo(Article::class);
    }

}
