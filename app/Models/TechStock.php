<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStock extends Model
{
    use HasFactory;
    protected $table = 'tech_stock';

    protected $fillable = [
        'id',
        'gasId',
        'disId',
        'qty',
    ];
}
