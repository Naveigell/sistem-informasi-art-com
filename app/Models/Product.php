<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'description'];

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
}
