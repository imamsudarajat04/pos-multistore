<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sales extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'store_id',
        'customer_id',
        'cashier_shift_id',
        'total',
        'discount',
        'tax',
        'payment_method'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    // Define the relationship with the Store model
    public function store()
    {
        return $this->belongsTo(Stores::class);
    }

    // Define the relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    // Define the relationship with the CashierShift model
    public function cashierShift()
    {
        return $this->belongsTo(CashierShifts::class);
    }

    // Define the relationship with the SalesDetails model
    public function salesDetails()
    {
        return $this->hasMany(SalesDetails::class);
    }
}
