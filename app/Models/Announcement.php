<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title', 'body', 'platform', 'price', 'developer', 'publisher'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray() :array {

        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'platform' => $this->platform,
            'body' => $this->body,
            'developer' => $this->developer,
            'publisher' => $this->publisher,
            'category' => $category,
        ];
        return $array;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
}
