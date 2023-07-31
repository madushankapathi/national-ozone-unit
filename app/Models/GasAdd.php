<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasAdd extends Model
{
    use HasFactory;

    protected $table = 'gas_add';

    protected $fillable = [
        'id',
        'disId',
        'gasId',
        'qty',
    ];
}
