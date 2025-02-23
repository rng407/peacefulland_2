<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';

    protected $fillable = [
        'nama',
        'dosis',
        'efek_samping',
        'indikasi',
        'kontraindikasi'

    ];
}
