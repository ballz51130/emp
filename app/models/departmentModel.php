<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB; 
class departmentModel extends Model
{
    //
    protected $table ="department";
    protected $fillable =["name"];
    public $pimarykey="id";
}
