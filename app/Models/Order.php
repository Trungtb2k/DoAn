<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = ['shiping_id','payment_id','order_subtotal',
    'order_discount','order_total','order_status','order_date'];

    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
}
