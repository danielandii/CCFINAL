<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'description', 'price'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
