<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectlist extends Model
{
    use HasFactory;

    protected $dates = [
    'accounting_date',
    ];
}
