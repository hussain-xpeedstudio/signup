<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepoStock extends Model
{
    protected $fillable = ['depo_id', 'warehouse_id', 'product_id', 'quantity','user_id',
        'ds_slug','employee_id'
];

    public function depo()
    {
        return $this->belongsTo(Depo::class, 'depo_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function depoProductStock()
    {
        return $this->hasOne(DepoProductStock::class, 'product_id', 'product_id');
    }

}
