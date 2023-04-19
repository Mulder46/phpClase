<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\Author;
use app\models\Article;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function autors(){
        return $this->hasMany(Author::class);
    }
    public function categories(){
        return $this->belongsToMany(Article::class,'article_category');
    }
    
}
