<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nom', 'prenom', 'image_url', 'bio', 'region_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    
    public function events(){
        return $this->belongsToMany('App\Event');
    }
    
    // public function myEvents(){
    //     return $this->hasMany('App\Event');
    // }

    public function myJobs(){
        return $this->hasMany('App\Jobs');
    }

    public function messages_received()
    {
        // return $this->belongsToMany('App\User', 'contacts', 'relating_id', 'related_id');
        return $this->belongsToMany('App\Message');
    }
    
    public function messages_sent()
    {
        // return $this->belongsToMany('App\User', 'contacts', 'relating_id', 'related_id');
        return $this->belongsToMany('App\Message');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    // contact section
    public function relate()
    {
        return $this->belongsToMany('App\User', 'contacts', 'relating_id', 'related_id');
        // return $this->belongsToMany('App\User', 'contacts');
        // return $this->belongsToMany('App\User');
    }

    public function isRelated()
    {
        return $this->belongsToMany('App\User', 'contacts', 'related_id', 'relating_id');
        // return $this->belongsToMany('App\User', 'contacts');
        // return $this->belongsToMany('App\User');
    }
    // contact end
}
