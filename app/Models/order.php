<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];

    public function order_generator_name()
    {
        return $this->belongsTo('App\Models\User', 'order_generated_by');
    }

    public function delivery_partner()
    {
        return $this->belongsTo('App\Models\User', 'delivery_partner');
    }
}
