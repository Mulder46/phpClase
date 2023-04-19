<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\Article;
use app\models\Category;

class Article_Category extends Model
{
    use HasFactory;
    protected $fillable = ['article_id','category_id'];
}
