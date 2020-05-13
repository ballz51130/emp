<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB ;
class positionModel extends Model
{
    //
    protected $table ="position";
    protected $fillable =["name"];
    public $pimarykey="id";
}
