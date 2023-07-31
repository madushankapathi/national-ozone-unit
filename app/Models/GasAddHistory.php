<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasAddHistory extends Model
{
    use HasFactory;

    protected $table = 'gas_add_history';

    protected $fillable = [
        'id',
        'disId',
        'gasId',
        'qty',
    ];
}
