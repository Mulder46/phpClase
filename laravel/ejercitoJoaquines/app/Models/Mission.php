<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soldier;

class Mission extends Model
{
  protected  $fillable= ['name','start_date','end_date'];
  function soldier(){
    return $this->hasMany(Soldier::class);
  }
    use HasFactory;
}
