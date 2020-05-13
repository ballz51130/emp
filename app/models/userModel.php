<?php

namespace App\models;
use DB;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    //
    protected $table ="users";
    protected $fillable =["name","email","password","lastname","position","department","prefix","type",];
    public $pimarykey="id";
}
