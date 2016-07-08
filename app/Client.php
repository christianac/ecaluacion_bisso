<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
    protected $fillable = ['nombre', 'razon_social', 'rfc'];

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function bank_account()
    {
        return $this->hasOne('App\BankAccount');
    }
}
