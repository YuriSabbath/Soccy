<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaComent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function agenda(){

        return $this->belongsTo('App\Models\Agenda');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
