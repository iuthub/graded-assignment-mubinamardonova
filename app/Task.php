<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task'];

    public function setTitleAttribute($value) {
        $this->attributes['task'] = strtolower($value);
    }

    public function getTitleAttribute($value) {
        return strtoupper($value);
    }
    public function user(){
        return $this->belongsTo('App\User'); 
    }
}
