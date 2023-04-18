<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Weapon;
use App\Models\Mission;

class Soldier extends Model
{
    use HasFactory;
    protected $filable=['name','dni','telephone','infantry'];
    function mission(){
       return $this->belongTo(Mission::class);
    }
    function weapon(){
        return $this->belongToMany(Weapon::class,'soldier_weapon');
    }
}
