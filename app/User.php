<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public $table = "users";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address','state','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function setTypeAttribute($valor){
        if(empty($valor)){
            $this->attributes['type'] = 'U';
        }else{
            $this->attributes['type'] = $valor;
        }
    }

    public function setStateAttribute($valor){
        if(empty($valor)){
            $this->attributes['state'] = 'A';
        }else{
            $this->attributes['state'] = $valor;
        }

    }

    public function setEmailAttribute($valor){
        if(!empty($valor)){
            $this->attributes['email'] = $valor;;
        }
    }


}
