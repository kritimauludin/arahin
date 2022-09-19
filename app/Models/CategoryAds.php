<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAds extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ads()
    {
        return $this->hasMany(Ads::class);
    }
}
