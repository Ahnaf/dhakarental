<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class, 'invoice_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'customer_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
