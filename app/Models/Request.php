<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id', 'email', 'quantity', 'requested_date', 'status', 'description',
    ];

    protected $casts = [
        'requested_date' => 'date',
    ];

    /**
     * Calculate and format the subtotal in Rupiah.
     *
     * @return string The formatted subtotal in Rupiah.
     */
    public function getSubTotalRupiahFormattedAttribute()
    {
        $this->loadMissing('product');

        return currency_format($this->sub_total);
    }

    /**
     * Get the sub total attribute.
     *
     * @return int The sub total value.
     */
    public function getSubTotalAttribute()
    {
        $this->loadMissing('product');

        return $this->product->price * $this->quantity;
    }

    /**
     * Retrieve the client associated with this instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Retrieves the payment data associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Retrieves the associated product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
