<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    //
    use SoftDeletes;
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
