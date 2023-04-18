<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soldier;

class Weapon extends Model
{
    use HasFactory;
    protected $fillable = ['name','type','caliber'];
    function Soldier(){
        return $this->belongToMany(Soldier::class,'soldier_weapon');
    }
}
