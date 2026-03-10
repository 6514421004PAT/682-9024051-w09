<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag; 
use App\Models\Gallery; 

class Community extends Model
{
    use HasFactory;

   
    protected $fillable = ['name', 'description', 'location', 'district', 'province'];

    public function galleries() 
    {
        return $this->hasMany(Gallery::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
       
        return $this->belongsToMany(Tag::class, 'communities_tag', 'community_id', 'tag_id');
    }
}