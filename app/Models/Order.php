<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id  = $id;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total): void
    {
        $this->total = $total;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function  setUserId($user_id): void
    {
        $this->user_id  = $user_id;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user): void
    {
        $this->user = $user;
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items): void
    {
        $this->items = $items;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}
