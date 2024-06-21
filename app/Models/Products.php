<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'price',
        'barcode',
        'category_id'
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

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    // Define the relationship with the PurchaseDetails model
    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class);
    }

    // Define the relationship with the SalesDetails model
    public function salesDetails()
    {
        return $this->hasMany(SalesDetails::class);
    }

    // Define the relationship with the StoreProducts model
    public function storeProducts()
    {
        return $this->hasMany(StoreProducts::class);
    }
}
