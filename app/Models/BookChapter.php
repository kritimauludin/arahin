<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_chapter'
            ]
        ];
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
