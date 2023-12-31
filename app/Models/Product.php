<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'price', 'description'];

    /**
     * A description of the artist function.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Delete the image associated with the product.
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete('public/products/images/' . $this->image);
    }

    /**
     * Sets the image attribute.
     *
     * @param mixed $value The value to set as the image attribute.
     * @return void
     */
    public function setImageAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            $name = Uuid::uuid4()->toString() . '.' . $value->extension();

            Storage::putFileAs('public/products/images', $value, $name);

            $this->attributes['image'] = $name;
        } else {
            $this->attributes['image'] = $value;
        }
    }

    /**
     * Sets the name attribute.
     *
     * @param mixed $value The value to set the name attribute to.
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value . '-' . uniqid());
    }

    /**
     * Retrieves the URL of the image attribute. Or default image URL if image file not exists
     *
     * @return string The URL of the image attribute.
     */
    public function getImageUrlAttribute()
    {
        if (!file_exists(storage_path('app/public/products/images/' . $this->image))) {
            return 'https://www.pulsecarshalton.co.uk/wp-content/uploads/2016/08/jk-placeholder-image.jpg';
        }

        return asset('storage/products/images/' . $this->image);
    }

    /**
     * Formats the price attribute in Rupiah.
     *
     * @return string The formatted price in Rupiah.
     */
    public function getRupiahFormattedPriceAttribute()
    {
        return currency_format($this->price);
    }

    /**
     * Retrieves the collection of requests associated with this instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
