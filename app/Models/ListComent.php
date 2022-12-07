<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListComent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lista(){

        return $this->belongsTo('App\Models\Lista');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
