<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // HasFactory allows to use factories with the Review model.
    use HasFactory;

    //Defines the attributes that can be mass-assigned.
    protected $fillable = ['review', 'rating'];

    // Defines an one-to-many relationship with the Book model.
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Static model that is executed when the moodel is bootstrapped.
    protected static function booted()
    {
        // When the review is updated, deleted or created the corresponding book cache entry is cleared.
        static::updated(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        static::deleted(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        static::created(fn(Review $review) => cache()->forget('book:' . $review->book_id));
    }
}
