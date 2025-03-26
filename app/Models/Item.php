<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getOrder()
    {
        return $this->order;
    }
    public function setOrder($order)
    {
        $this->order = $order;
    }
    public function product()
    {
        return $this->belongsTo(Product::class);

    }
    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
}
