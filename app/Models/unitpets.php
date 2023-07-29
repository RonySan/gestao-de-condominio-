<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unitpets extends Model
{
    use HasFactory;
    protected $hidden = [
        'id_unit'
    ];

    public $timestamp = false;

    public $table = 'unitpets';

}
