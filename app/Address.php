<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['calle', 'numero', 'estado', 'municipio'];	


    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
}
