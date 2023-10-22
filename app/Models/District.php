<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'area_districts';

    protected $fillable = ['regency_id', 'code', 'name'];

    public $timestamps = false;

    use HasFactory;
}
