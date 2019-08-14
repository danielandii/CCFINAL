<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'male_name', 'female_name', 'event_date', 'plan_name', 'address1', 'address2', 'family1', 'family2', 'latitude', 'longitude',
    ];

    protected $hidden = [
        'password',
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

}
