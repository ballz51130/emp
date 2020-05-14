<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class leaveModel extends Model
{
    //
    protected $table ="leave";
    protected $fillable =["address","date","dear","U_id","title","vacation","etc","detail","indate","todate","alltime","contacted","approve","status"];
    public $pimarykey="id";
}
