<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body',
    //     'category',
    //     'img_url',
    //     'author',
    // ];

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
             'source'=> 'title'
        ]];
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'. $search.'%')
            ->orWhere('body', 'like', '%'.$search.'%');
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
