<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table ='student';
    //protected $fillable = ['name','active','created_at','updated_at'];
    protected $guarded = [];
}
