<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = "bill_detail";

    const processing = 0;
    const receiving = 1;
    const delivered = 2;
    const fail =3;
    public function billProduct()
    {
        return $this->belongsTo(Product::class,'id_product', 'id');
    }
}