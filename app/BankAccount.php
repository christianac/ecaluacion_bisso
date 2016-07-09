<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bank_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['banco', 'sucursal', 'numero_cuenta'];	


    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
}
