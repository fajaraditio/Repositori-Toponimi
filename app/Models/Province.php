<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'area_provinces';

    protected $fillable = ['code', 'name'];

    public $timestamps = false;

    use HasFactory;
}
