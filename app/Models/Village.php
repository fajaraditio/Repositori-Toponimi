<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'area_villages';

    protected $fillable = ['district_id', 'code', 'name'];

    public $timestamps = false;

    use HasFactory;
}
