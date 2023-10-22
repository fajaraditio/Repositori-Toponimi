<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toponym extends Model
{
    use HasFactory;

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function set_langs()
    {
        return $this->belongsToMany(SetLang::class, 'toponyms_langs');
    }

    public function set_word_class()
    {
        return $this->hasOneThrough(SetLang::class, 'toponyms_word_classes');
    }
}
