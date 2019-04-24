<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'table_customers';
    protected $filable=[
        'name','address','phone'
    ];
}
