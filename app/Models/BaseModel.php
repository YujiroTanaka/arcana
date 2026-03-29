<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $table = 'base_models';

    protected $guarded = ['id'];
}
