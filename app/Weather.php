<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'weatherdata';
    protected $fillable = ['temperature', 'humidity', 'voltage'];

}
