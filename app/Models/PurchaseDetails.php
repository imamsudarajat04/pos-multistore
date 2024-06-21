<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PurchaseDetails extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price',
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

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    // Define the relationship with the Purchase model
    public function purchase()
    {
        return $this->belongsTo(Purchases::class);
    }
}
