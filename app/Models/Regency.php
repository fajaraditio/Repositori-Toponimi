<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'area_regencies';

    protected $fillable = ['province_id', 'code', 'name'];

    public $timestamps = false;

    use HasFactory;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
