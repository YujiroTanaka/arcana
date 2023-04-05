<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminInformation extends Model
{
    protected $table = 'admin_informations';

    protected $guarded = ['id'];

    protected $dates = [
        'information_date',
    ];
}
