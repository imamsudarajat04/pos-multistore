<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stores extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'code',
        'email',
        'phonenumber',
        'addressone',
        'addresstwo',
        'postalcode',
        'city',
        'province',
        'country',
        'logo',
        'receiptheader',
        'receiptfootnotes',
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

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function cashierShifts()
    {
        return $this->hasMany(CashierShifts::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }

    // Define the relationship with the Sales model
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    // Define the relationship with the StoreProducts model
    public function storeProducts()
    {
        return $this->hasMany(StoreProducts::class);
    }
}
