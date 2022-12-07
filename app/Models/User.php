<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'unique_id',
        'username',
        'pronoun',
        'bio',
        'date',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relação ManyToMany (seguir)
    public function followers(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'user_follower', 'following_id', 'follower_id');
    }

    public function following(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'user_follower', 'follower_id', 'following_id');
    }

    //Relação OneToMany (postar)
    public function post(){

        return $this->hasMany('App\Models\Post');

    }

    public function humor(){

        return $this->hasMany('App\Models\Humor');

    }


    public function agenda(){

        return $this->hasMany('App\Models\Agenda');

    }

    public function lista(){

        return $this->hasMany('App\Models\Lista');

    }

    public function coment(){

        return $this->hasMany('App\Models\Coment');

    }

    public function listcoment(){

        return $this->hasMany('App\Models\ListComent');

    }

    public function agendacoment(){

        return $this->hasMany('App\Models\AgendaComent');

    }
}
