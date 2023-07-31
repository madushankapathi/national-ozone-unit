<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasDistribute extends Model
{
    use HasFactory;
    protected $table = 'gas_distribute';

    protected $fillable = [
        'id',
        'disId',
        'qty',
        'techId',
        'status',
        'gasId',
    ];
}
