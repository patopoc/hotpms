<?php

namespace Hotpms;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Role extends Model
{    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    
    public $timestamps= false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    public function roleDetails(){
    	return $this->hasMany('Hotpms\RoleDetail','id_role','id');
    }

}
